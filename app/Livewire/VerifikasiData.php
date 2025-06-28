<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin.dashboard')]
class VerifikasiData extends Component
{
    public function render()
    {
        return view('livewire.admin.verifikasi-data');
    }
}
