<?php

namespace App\Livewire;

use App\Models\Room;
use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;
use App\Models\PendingUpdate;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Services\PendingUpdateService;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.admin.dashboard')]
class VerifikasiData extends Component
{
    public function accept($id)
    {
        $update = PendingUpdate::find($id);
        $data = json_decode($update->new_data, true);
        switch ($update->table) {
            case 'campuses':
                if (isset($data['images_path']) && is_array($data['images_path'])) {
                    $movedPaths = [];

                    foreach ($data['images_path'] as $path) {
                        $newPath = 'campuses/' . basename($path);
                        Storage::move($path, $newPath);
                        $movedPaths[] = $newPath;
                    }

                    $data['images_path'] = $movedPaths;
                    $update->save();
                }
                Campus::create($data);
                break;
            case 'buildings':
                if (isset($data['images_path']) && is_array($data['images_path'])) {
                    $movedPaths = [];

                    foreach ($data['images_path'] as $path) {
                        $newPath = 'buildings/' . basename($path);
                        Storage::move($path, $newPath);
                        $movedPaths[] = $newPath;
                    }

                    $data['images_path'] = $movedPaths;
                    $update->save();
                }
                Building::create($data);
                break;
            case 'rooms':
                if (isset($data['images_path']) && is_array($data['images_path'])) {
                    $movedPaths = [];

                    foreach ($data['images_path'] as $path) {
                        $newPath = 'rooms/' . basename($path);
                        Storage::move($path, $newPath);
                        $movedPaths[] = $newPath;
                    }

                    $data['images_path'] = $movedPaths;
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
        $update = PendingUpdate::findOrFail($id);
        $update->status = 'rejected';
        $update->save();
    }
    public function render()
    {
        $datas = PendingUpdate::paginate(10);
        $datas->getCollection()->transform(function ($update) {
            return PendingUpdateService::transform($update);
        });

        return view('livewire.admin.verifikasi-data', [
            'datas' => $datas,
        ]);
    }
}
