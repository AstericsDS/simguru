<?php

namespace App\Livewire;

use App\Models\Building;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Update;


class ListGedung extends Component
{
    public $search = '';

    public function render()
    {
        $buildings = Building::when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->with('campus')->paginate(10);
        $updates = Update::when(
            $this->search !== '',
            fn(Builder $query) => $query->where('new_data->name', 'like', '%' . $this->search . '%')
        )->where('table', 'rooms')->whereIn('status', ['pending', 'rejected'])->get();
        return view('livewire.listgedung',[
            'buildings' => $buildings,
            'updates' => $updates,
        ]);
    }
}
