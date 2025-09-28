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
        $rooms = Room::when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->with('campus', 'building')->paginate(10);
        $updates = Update::when(
            $this->search !== '',
            fn(Builder $query) => $query->where('new_data->name', 'like', '%' . $this->search . '%')
        )->where('table', 'rooms')->whereIn('status', ['pending', 'rejected'])->get();
        return view('livewire.listruang',[
            'rooms' => $rooms,
            'updates' => $updates,
        ]);
    }
}
