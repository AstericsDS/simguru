<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Form extends Component
{
    public $name, $floor, $description, $images_path, $status;
    public function save() {
        $response = Http::post(route('buildings.store'), [
            'name' => $this->name,
            'floor' => $this->floor,
            'description' => $this->description,
            'images_path' => $this->images_path,
            'status' => $this->status
        ]);

        if($response->successful()) {
            session()->flash('message', 'Data saved successfully!');
        } else {
            session()->flash('message', 'Failed to save data!');
        }
    }

    public function render()
    {
        return view('livewire.form');
    }
}
