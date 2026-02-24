<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.login')]
#[Title('Login Admin')]
class LoginAdmin extends Component
{
    public $name, $password;
    protected $rules = [
        'name' => 'required',
        'password' => 'required'
    ];
    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->to(route('dashboard'));
        }

        $this->addError('login', 'Login Gagal');

    }

    public function render()
    {
        return view('livewire.login-admin');
    }
}
