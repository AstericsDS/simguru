<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->away(config('sso.logout_url'));
    }

    public function back()
    {
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
