<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;

class Sidebar extends Component
{
    public $super_admin_id;
    public $admin_id;
    public function mount()
    {
        $this->super_admin_id = Role::where('name', '=', 'super_admin')->value('id');
        $this->admin_id = Role::where('name', '=', 'admin')->value('id');
    }
    public function render()
    {
        return view('livewire.sidebar');
    }
}
