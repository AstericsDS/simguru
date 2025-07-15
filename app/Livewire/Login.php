<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Login')]
#[Layout('components.layouts.login')]
class Login extends Component
{
    public function render()
    {
        return view('livewire.login')->layout('livewire.login');
    }
}
