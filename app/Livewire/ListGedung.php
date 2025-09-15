<?php

namespace App\Livewire;

use App\Models\Building;
use Livewire\Component;

class ListGedung extends Component
{
    public function render()
    {
        $buildings = Building::all();
        return view('livewire.listgedung',[
            'buildings' => $buildings,
        ]);
    }
}
