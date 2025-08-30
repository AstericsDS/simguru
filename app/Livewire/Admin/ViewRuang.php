<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin.dashboard')]
class ViewRuang extends Component
{
    public Room $room;
    public function mount(Room $room)
    {
        $this->room = $room;
    }
    public function render()
    {
        return view('livewire.admin.view-ruang');
    }
}
