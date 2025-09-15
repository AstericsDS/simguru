<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Update;
use Livewire\Component;
use App\Models\Building;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Collection;

#[Layout('components.layouts.admin.dashboard')]
class ViewGedung extends Component
{
    public ?Building $building;
    public ?Update $pending;
    public Collection $rooms;
    public function mount($id)
    {
        $this->building = Building::where('slug', $id)->first();
        $this->pending = Update::find($id);

        if (isset($this->building)) {
            $this->rooms = Room::where('building_id', $this->building->id)->get();
        }
    }
    public function render()
    {
        return view('livewire.admin.view-gedung');
    }
}
