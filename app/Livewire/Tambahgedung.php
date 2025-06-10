<?php

namespace App\Livewire;

use Livewire\Component;

class TambahGedung extends Component
{
    public $name = '';
    public $address = '';
    public $floor = '';
    public $area = '';

    public function save() {
    }

    public function render()
    {
        return view('livewire.tambah-gedung');
    }
}
