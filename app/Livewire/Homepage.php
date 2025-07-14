<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Http;

#[Title('Homepage')]
class Homepage extends Component
{
    public function render()
    {
        return view('livewire.homepage');
    }
}
