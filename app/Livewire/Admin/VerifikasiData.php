<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Campus;
use App\Models\Update;
use Livewire\Component;
use App\Models\Building;
use App\Services\UpdateService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.admin.dashboard')]
class VerifikasiData extends Component
{
    public Update $selectedUpdate;
    public $parsed_new_data = [];
    public $images_path_old = [];
    public $images_path_new = [];
    public $new_data = [];
    public $old_data = [];

    #[Validate('required', message: 'Isi alasan penolakan')]
    public $reject_reason;

    public function confirm($id, $action)
    {
        if ($action === 'reject') {
            $this->validateOnly('reject_reason');
            $update = Update::findOrFail($id);
            $update->status = 'rejected';
            $update->reject_reason = $this->reject_reason;
            $update->save();
            $this->dispatch('confirm');
            return;
        }

        $update = Update::find($id);
        $data = $update->new_data;

        switch ($update->table) {
            case 'campuses':
                $campus = Campus::find($update->record_id);

                if ($campus) {
                    $oldImages = $campus->images_path ?? [];
                    $newImages = $data['images_path'] ?? [];

                    // Delete removed images from storage
                    foreach ($oldImages as $oldImage) {
                        if (!in_array($oldImage, $newImages)) {
                            Storage::disk('public')->delete($oldImage);
                        }
                    }

                    // Move temp images to final folder
                    $movedPaths = [];
                    foreach ($newImages as $path) {
                        if (str_starts_with($path, 'temp/')) {
                            $filename = basename($path);
                            $newPath = 'campuses/' . $filename;
                            if (Storage::disk('public')->exists($path)) {
                                Storage::disk('public')->move($path, $newPath);
                            }
                            $movedPaths[] = $newPath;
                        } else {
                            $movedPaths[] = $path; // already stored
                        }
                    }

                    $data['images_path'] = $movedPaths;
                    $update->new_data = $data;

                    // Update campus
                    $campus->update($data);

                } else {
                    // New campus creation if record_id was null
                    $movedPaths = [];
                    foreach ($data['images_path'] as $path) {
                        if (str_starts_with($path, 'temp/')) {
                            $filename = basename($path);
                            $newPath = 'campuses/' . $filename;
                            if (Storage::disk('public')->exists($path)) {
                                Storage::disk('public')->move($path, $newPath);
                            }
                            $movedPaths[] = $newPath;
                        }
                    }
                    $data['images_path'] = $movedPaths;

                    $newCampus = Campus::create($data);
                    $update->record_id = $newCampus->id;
                    $update->new_data = $data;
                }

                $update->status = 'approved';
                $update->approved_by = Auth::id();
                $update->save();
                break;

            case 'buildings':
                $building = Building::find($update->record_id);

                if ($building) {
                    $oldImages = $building->images_path ?? [];
                    $newImages = $data['images_path'] ?? [];

                    // Delete removed images from storage
                    foreach ($oldImages as $oldImage) {
                        if (!in_array($oldImage, $newImages)) {
                            Storage::disk('public')->delete($oldImage);
                        }
                    }

                    // Move temp images to final folder
                    $movedPaths = [];
                    foreach ($newImages as $path) {
                        if (str_starts_with($path, 'temp/')) {
                            $filename = basename($path);
                            $newPath = 'buildings/' . $filename;
                            if (Storage::disk('public')->exists($path)) {
                                Storage::disk('public')->move($path, $newPath);
                            }
                            $movedPaths[] = $newPath;
                        } else {
                            $movedPaths[] = $path; // already stored
                        }
                    }

                    $data['images_path'] = $movedPaths;
                    $update->new_data = $data;

                    // Update building
                    $building->update($data);

                } else {

                    // New campus creation if record_id was null
                    $movedPaths = [];
                    foreach ($data['images_path'] as $path) {
                        if (str_starts_with($path, 'temp/')) {
                            $filename = basename($path);
                            $newPath = 'buildings/' . $filename;
                            if (Storage::disk('public')->exists($path)) {
                                Storage::disk('public')->move($path, $newPath);
                            }
                            $movedPaths[] = $newPath;
                        }
                    }
                    $data['images_path'] = $movedPaths;

                    $newBuilding = Building::create($data);
                    $update->record_id = $newBuilding->id;
                    $update->new_data = $data;
                }

                $update->status = 'approved';
                $update->approved_by = Auth::id();
                $update->save();
                break;

            case 'rooms':
                $room = Room::find($update->record_id);

                if ($room) {
                    $oldImages = $room->images_path ?? [];
                    $newImages = $data['images_path'] ?? [];

                    // Delete removed images from storage
                    foreach ($oldImages as $oldImage) {
                        if (!in_array($oldImage, $newImages)) {
                            Storage::disk('public')->delete($oldImage);
                        }
                    }

                    // Move temp images to final folder
                    $movedPaths = [];
                    foreach ($newImages as $path) {
                        if (str_starts_with($path, 'temp/')) {
                            $filename = basename($path);
                            $newPath = 'rooms/' . $filename;
                            if (Storage::disk('public')->exists($path)) {
                                Storage::disk('public')->move($path, $newPath);
                            }
                            $movedPaths[] = $newPath;
                        } else {
                            $movedPaths[] = $path; // already stored
                        }
                    }

                    $data['images_path'] = $movedPaths;
                    $update->new_data = $data;

                    // Update campus
                    $room->update($data);

                } else {
                    // New campus creation if record_id was null
                    $movedPaths = [];
                    foreach ($data['images_path'] as $path) {
                        if (str_starts_with($path, 'temp/')) {
                            $filename = basename($path);
                            $newPath = 'rooms/' . $filename;
                            if (Storage::disk('public')->exists($path)) {
                                Storage::disk('public')->move($path, $newPath);
                            }
                            $movedPaths[] = $newPath;
                        }
                    }
                    $data['images_path'] = $movedPaths;

                    $newRoom = Room::create($data);
                    $update->record_id = $newRoom->id;
                    $update->new_data = $data;
                }

                $update->status = 'approved';
                $update->approved_by = Auth::id();
                $update->save();
                break;

            default:
                throw new \Exception("Unsupported table type: {$update->table}");
        }

        $update->status = 'approved';
        $update->approved_by = Auth::id();
        $update->save();
    }

    public $filter = 'all';
    public $sort = 'asc';
    public function setFilter($status)
    {
        $this->filter = $status;
    }
    public function sortDate()
    {
        $this->sort = $this->sort === 'asc' ? 'desc' : 'asc';
    }
    public function view($id)
    {
        $this->selectedUpdate = Update::with('admin', 'approver')->find($id);
        $this->selectedUpdate = UpdateService::transform($this->selectedUpdate);

        $this->new_data = $this->selectedUpdate->new_data;
        $this->old_data = $this->selectedUpdate->old_data;

        $this->dispatch('view');
    }

    public function render()
    {
        $updates = Update::query();
        if ($this->filter !== 'all') {
            $updates->where('status', $this->filter);
        }
        $updates = $updates->with('admin')->orderBy('updated_at', $this->sort)->paginate(10);
        $updates->getCollection()->transform(function ($update) {
            return UpdateService::transform($update);
        });

        return view('livewire.admin.verifikasi-data', [
            'updates' => $updates,
        ]);
    }
}
