<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Building;
use App\Models\Room;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Collection;

#[Layout('components.layouts.admin.dashboard')]
class ViewGedung extends Component
{
    public Building $building;
    public Collection $rooms;
    public function mount(Building $building)
    {
        $this->building = $building;
        $this->rooms = Room::where('building_id', $this->building->id)->get();
    }
    public function render()
    {
        return view('livewire.admin.view-gedung');
    }
}
