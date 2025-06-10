<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Building;

class TambahGedung extends Component
{
    public $name = '';
    public $address = '';
    public $floor = '';
    public $area = '';
    public $status = 0;
    public $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, temporibus.';
    public $images_path = 'lorem';

    public function rules() {
        return [
            'name' => 'required|min:7',
            'address' => 'required',
            'floor' => 'required|integer',
            'area' => 'required|integer',
            'status' => 'required',
            'description' => 'required',
            'images_path' => 'required'
        ];
    }

    public function save() {
        $validate = $this->validate();
        Building::create($validate);
        return redirect()->to(route('tambah-gedung'));
    }

    public function render()
    {
        return view('livewire.tambah-gedung');
    }
}
