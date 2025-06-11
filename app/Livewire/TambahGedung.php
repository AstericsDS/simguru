<?php

namespace App\Livewire;

use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;

class TambahGedung extends Component
{
    public $name, $address, $floor, $area, $description;
    public $status = 0;

    public function rules() {
        return [
            'name' => 'required',
            'address' => 'required',
            'floor' => 'required|integer',
            'area' => 'required|integer',
            'status' => 'required',
            'description' => 'required',
        ];
    }

    public function save() {
        $validate = $this->validate();
        Building::create($validate);
        $this->reset();
        session()->flash('success', 'Gedung berhasil dibuat');
    }

    public function render()
    {
        return view('livewire.tambah-gedung', [
            'campuses' => Campus::all(),
            'buildings' => Building::paginate(10),
        ]);
    }
}
