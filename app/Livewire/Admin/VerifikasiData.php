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

#[Layout('components.layouts.admin.dashboard')]
class VerifikasiData extends Component
{
    public Update $selectedUpdate;
    public $parsed_new_data = [];
    public $images_path_old = [];
    public $images_path_new = [];
    public $new_data = [];
    public $old_data = [];
    public function confirm($id, $action)
    {
        if ($action === 'reject') {
            $update = Update::findOrFail($id);
            $update->status = 'rejected';
            $update->save();
            return;
        }

        $update = Update::find($id);
        $data = json_decode($update->new_data, true);

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

        $this->new_data = json_decode($this->selectedUpdate->new_data, true);
        $this->old_data = json_decode($this->selectedUpdate->old_data, true);

        // $this->images_path_new = $newData['images_path'] ?? [];
        // $this->images_path_old = $oldData['images_path'] ?? [];
        // $this->parsed_new_data = $this->selectedUpdate->parsed_new_data;
        // $this->parsed_old_data = $this->selectedUpdate->parsed_old_data;
        // dd($this->selectedUpdate->toArray());

        $this->dispatch('view');
    }

    public function render()
    {
        $updates = Update::query();
        if ($this->filter !== 'all') {
            $updates->where('status', $this->filter);
        }
        $updates = $updates->with('admin')->orderBy('created_at', $this->sort)->paginate(10);
        $updates->getCollection()->transform(function ($update) {
            return UpdateService::transform($update);
        });

        return view('livewire.admin.verifikasi-data', [
            'updates' => $updates,
        ]);
    }
}
