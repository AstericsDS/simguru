<?php

namespace App\Livewire;

use App\Models\Room;
use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;
use App\Models\PendingUpdate;
use Livewire\Attributes\Layout;
use App\Services\PendingUpdateService;

#[Layout('components.layouts.admin.dashboard')]
class VerifikasiData extends Component
{
    public function accept($id)
    {
        $update = PendingUpdate::findOrFail($id);
        $data = json_decode($update->new_data, true);

        switch ($update->table) {
            case 'campuses':
                Campus::create($data);
                break;
            case 'buildings':
                Building::create($data);
                break;
            case 'rooms':
                Room::create($data);
                break;
            default:
                throw new \Exception("Unsupported table type: {$update->table}");
        }

        $update->status = 'approved';
        $update->save();
    }
    public function reject($id) {
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
