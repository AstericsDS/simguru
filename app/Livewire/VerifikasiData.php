<?php

namespace App\Livewire;

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
                if (isset($data['images_path']) && is_array($data['images_path'])) {
                    $movedPaths = [];

                    foreach ($data['images_path'] as $path) {
                        $filename = basename($path);
                        $oldPath = 'temp/' . $filename;
                        $newPath = 'campuses/' . $filename;

                        if (Storage::disk('public')->exists($oldPath)) {
                            $file = Storage::disk('public')->get($oldPath);

                            // Store file in new location
                            Storage::disk('public')->put($newPath, $file);

                            // Delete the old file
                            Storage::disk('public')->delete($oldPath);

                            // Save moved path
                            $movedPaths[] = $newPath;
                        } else {
                            // Handle file not found (optional)
                            Log::warning("File not found: " . $oldPath);
                        }
                    }

                    $data['images_path'] = $movedPaths;
                    $update->new_data = json_encode($data);
                    $update->save();
                }
                Campus::create($data);
                break;
            case 'buildings':
                if (isset($data['images_path']) && is_array($data['images_path'])) {
                    $movedPaths = [];

                    foreach ($data['images_path'] as $path) {
                        $filename = basename($path);
                        $oldPath = 'temp/' . $filename;
                        $newPath = 'buildings/' . $filename;

                        if (Storage::disk('public')->exists($oldPath)) {
                            $file = Storage::disk('public')->get($oldPath);

                            // Store file in new location
                            Storage::disk('public')->put($newPath, $file);

                            // Delete the old file
                            Storage::disk('public')->delete($oldPath);

                            // Save moved path
                            $movedPaths[] = $newPath;
                        } else {
                            // Handle file not found (optional)
                            Log::warning("File not found: " . $oldPath);
                        }
                    }

                    $data['images_path'] = $movedPaths;
                    $update->new_data = json_encode($data);
                    $update->save();
                }
                Building::create($data);
                break;
            case 'rooms':
                if (isset($data['images_path']) && is_array($data['images_path'])) {
                    $movedPaths = [];

                    foreach ($data['images_path'] as $path) {
                        $filename = basename($path);
                        $oldPath = 'temp/' . $filename;
                        $newPath = 'rooms/' . $filename;

                        if (Storage::disk('public')->exists($oldPath)) {
                            $file = Storage::disk('public')->get($oldPath);

                            // Store file in new location
                            Storage::disk('public')->put($newPath, $file);

                            // Delete the old file
                            Storage::disk('public')->delete($oldPath);

                            // Save moved path
                            $movedPaths[] = $newPath;
                        } else {
                            // Handle file not found (optional)
                            Log::warning("File not found: " . $oldPath);
                        }
                    }

                    $data['images_path'] = $movedPaths;
                    $update->new_data = json_encode($data);
                    $update->save();
                }
                Room::create($data);
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
