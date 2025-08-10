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


class VerifikasiData extends Component
{
    public function accept($id)
    {
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

                    $newBuilding = Campus::create($data);
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

                    // Update campus
                    $room->update($data);

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
    public function reject($id)
    {
        $update = Update::findOrFail($id);
        $update->status = 'rejected';
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
        ])->layout('components.layouts.admin.dashboard');
    }
}
