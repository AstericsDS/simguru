<?php

namespace App\Livewire;

use Livewire\Component;
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
    public function mount()
    {
        // 1. Already logged in? Clean up and go straight to the app.
        if (Auth::check()) {
            session()->forget('sso_redirect_count');
            return redirect()->route('dashboard'); // Make sure this matches your route name
        }

        // 2. Read the counter (default to 0 if it doesn't exist)
        $attempts = session('sso_redirect_count', 0);

        // 3. THE CIRCUIT BREAKER
        if ($attempts >= 2) {
            session()->forget('sso_redirect_count');
            return;
        }

        // 4. INCREMENT THE COUNTER
        session(['sso_redirect_count' => $attempts + 1]);

        // 5. REDIRECT TO SSO
        return redirect()->route('sso.silent-login');
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
