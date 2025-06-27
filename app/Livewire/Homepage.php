<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Http;

#[Title('Homepage')]
class Homepage extends Component
{
    public function getData() {
        return $data = Http::get('http://127.0.0.1:8001/api/buildings');
    }
    public function render()
    {
        dd(Http::get('http://127.0.0.1:8001/api/buildings')->json());
        return view('livewire.homepage');
    }
}
