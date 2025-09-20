<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Update;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin.dashboard')]
class ViewRuang extends Component
{
    public ?Room $room;
    public ?Update $pending;
    public function mount($id)
    {
        $this->room = Room::where('slug', $id)->first();
        $this->pending = Update::find($id);
    }
    public function render()
    {
        return view('livewire.admin.view-ruang');
    }
}
