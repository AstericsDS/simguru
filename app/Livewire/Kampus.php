<?php

namespace App\Livewire;

use App\Models\Building;
use App\Models\Campus;
use Livewire\Component;

class Kampus extends Component
{
    public Campus $campus;

    public function mount(Campus $campus)
    {
        $this->campus = $campus;
    }

    public function back(){
        return back();
    }

    public function render()
    {
        $buildings = Building::all();
        return view('livewire.kampus', [
            'buildings' => $buildings,
            'campus' => $this->campus,
        ]);
    }
}
