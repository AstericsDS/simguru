<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Update;

class ListRuang extends Component
{
    public $search = '';

    public function render()
    {
        $rooms = Room::where('show', true)->when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->with('campus', 'building')->paginate(10);
        return view('livewire.listruang',[
            'rooms' => $rooms,
        ]);
    }
}
