<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.login')]
#[Title('Login')]
class Login extends Component
{
    public $name;
    public $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
    public function login() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
