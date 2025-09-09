<?php

namespace App\Livewire\Component;

use Livewire\Component;
use App\Models\Campus;
use App\Models\Building;
use App\Models\Room;

class Jadwalruangan extends Component
{
    public $selectedCampus, $selectedBuilding, $selectedRoom;
    public $campusbuildings = [];
    public $buildingrooms = [];

    public function updatedSelectedCampus($value)
    {
        $this->selectedBuilding = null;
        $this->selectedRoom = null;
        $this->campusbuildings = Building::where('campus_id', $value)->get();
        $this->buildingrooms = [];
    }

    public function updatedSelectedBuilding($value)
    {
        $this->selectedRoom = null;
        $this->buildingrooms = Room::where('building_id', $value)->get();
    }

    public function render()
    {
        // if (!empty($this->selectedCampus)) {
        //     $this->campusbuildings = Building::where('campus_id', $this->selectedCampus)->get();
        // }
        // if (!empty($this->selectedBuilding)) {
        //     $this->buildingrooms = Room::where('building_id', $this->selectedBuilding)->get();
        // }
        return view('livewire.component.jadwalruangan', [
            'campuses' => Campus::all(),
            'campusbuildings' => $this->campusbuildings,
            'buildingrooms' => $this->buildingrooms
        ]);
    }
}
