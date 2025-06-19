<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.login')]
#[Title('Login')]
class Login extends Component
{
    public function render()
    {
        return view('livewire.admin.login');
    }
}
