<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin.dashboard')]
class DetailAll extends Component
{
    public function render()
    {
        return view('livewire.admin.detail-all');
    }
}
