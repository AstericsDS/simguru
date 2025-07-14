<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Building;

class ModelBinding extends Component
{
    public Building $building;
    public function render()
    {
        return view('livewire.model-binding', [
            'building' => $this->building
        ]);
    }
}
