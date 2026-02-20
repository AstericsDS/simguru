<?php

namespace App\Livewire;

use App\Http\Controllers\SsoController;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Login')]
#[Layout('components.layouts.login')]

class Login extends Component
{
    public $name, $password;
    protected $rules = [
        'name' => 'required',
        'password' => 'required'
    ];
    public function boot()
    {
        if (!Auth::check()) {
            return;
        }
        return redirect()->to(route('dashboard'));
    }
    public function login()
    {
        dd(Auth::check());
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->to(route('dashboard'));
        }

        $this->addError('login', 'Login Gagal');

    }
    public function render()
    {
        return view('livewire.login');
    }
}
