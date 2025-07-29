<?php

namespace App\Livewire;

use App\Models\Building;
use App\Models\Campus;
use Livewire\Component;

class Kampus extends Component
{
    public string $campus;
    public Campus $kampus;

    public function mount()
    {
        $this->kampus = Campus::where('slug', $this->campus)->firstOrFail();
    }

    public function render()
    {
        $buildings = Building::all();
        return view('livewire.kampus', [
            'buildings' => $buildings,
            'campus' => $this->kampus,
        ]);
    }
}
