<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.login')]
#[Title('Login')]
class Login extends Component
{
    public $name, $password;
    protected $rules = [
        'name' => 'required',
        'password' => 'required'
    ];
    public function login() {
        $credentials = $this->validate();
        if (Auth::attempt($credentials)) {
            return $this->redirect(route('dashboard'), navigate:true);
        } else {
            dd('Gagal');
        }
    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
