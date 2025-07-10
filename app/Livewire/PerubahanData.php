<?php

namespace App\Livewire;

use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;
use App\Models\PendingUpdate;
use Livewire\Attributes\Layout;
use App\Services\PendingUpdateService;

#[Layout('components.layouts.admin.dashboard')]
class PerubahanData extends Component
{
    public function render()
    {
        $updates = PendingUpdate::with(['admin', 'approver'])
            ->paginate(10); // You can change 10 to any per-page number

        // Then map the paginated items (not the whole collection)
        // $updates->getCollection()->transform(function ($update) {
        //     $update->parsed_new_data = json_decode($update->new_data, true);
        //     return $update;
        // });

        // $updates->getCollection()->transform(function ($update) {
        //     $parsed = json_decode($update->new_data, true);
        //     $transformed = [];

        //     switch ($update->table) {
        //         case "campuses":
        //             foreach($parsed as $key => $value) {
        //                 switch ($key) {
        //                     case "name":
        //                         $transformed['Nama'] = $value;
        //                     case "address":
        //                         $transformed['Alamat'] = $value;
        //                     case "contact":
        //                         $transformed['Kontak'] = $value;
        //                     case "email":
        //                         $transformed['Email'] = $value;
        //                     case "description":
        //                         $transformed['Deskripsi'] = $value;
        //                 }
        //             }
        //             break;

        //         case "buildings":
        //             foreach($parsed as $key => $value) {
        //                 switch($key) {
        //                     case "name":
        //                         $transformed['Nama'] = $value;
        //                     case "campus_id":
        //                         $transformed['Kampus'] = Campus::find($value)->name ?? 'Null';
        //                     case "area":
        //                         $transformed['Luas'] = $value;
        //                     case "floor":
        //                         $transformed['Lantai'] = $value;
        //                     case "description":
        //                         $transformed['Deskripsi'] = $value;
        //                     case "address":
        //                         $transformed['Alamat'] = $value;
        //                 }
        //             }
        //             break;

        //         case "rooms":
        //             foreach($parsed as $key => $value) {
        //                 switch($key) {
        //                     case "name":
        //                         $transformed['Nama'] = $value;
        //                     case "building_id":
        //                         $transformed['Gedung'] = Building::find($value)->name ?? 'Null';
        //                     case "floor":
        //                         $transformed['Lantai'] = $value;
        //                     case "capacity":
        //                         $transformed['Kapasitas'] = $value;
        //                     case "description":
        //                         $transformed['Deskripsi'] = $value;
        //                     case "status":
        //                         $transformed['Status'] = $value;
        //                 }
        //             }
        //             break;
        //     }

        //     $update->parsed_new_data = $transformed;
        //     return $update;
        // });
        
        $updates->getCollection()->transform(function ($update) {
            return PendingUpdateService::transform($update);
        });


        return view('livewire.perubahan-data', [
            'updates' => $updates,
        ]);
    }
}
