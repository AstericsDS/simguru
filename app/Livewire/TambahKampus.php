<?php

namespace App\Livewire;

use App\Models\Campus;
use Livewire\Component;

class TambahKampus extends Component
{
    public $name, $address, $contact, $email, $description;

    public function rules() {
        return [
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'description' => 'required'
        ];

    }

    public function save() {
        $validated = $this->validate();
        Campus::create($validated);
        $this->reset();
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.tambah-kampus', [
            'campuses' => Campus::all()
        ]);
    }
}
