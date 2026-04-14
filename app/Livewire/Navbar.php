<?php

namespace App\Livewire;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{

    public function logout()
    {
        $super_admin_id = Role::where('name', '=', 'super_admin')->value('id');
        if(Auth::user()->role === $super_admin_id) {
            Auth::logout();
            return redirect()->route('homepage');
        }
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
