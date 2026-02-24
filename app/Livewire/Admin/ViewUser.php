<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;

#[Layout('components.layouts.admin.dashboard')]
#[Title('Detail User')]
class ViewUser extends Component
{
    public User $user;
    public function mount(User $user)
    {
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.admin.view-user');
    }
}
