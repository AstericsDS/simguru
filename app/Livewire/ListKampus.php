<?php

namespace App\Livewire;

use App\Models\Campus;
use Livewire\Component;

class ListKampus extends Component
{
    public function render()
    {
        $campuses = Campus::all();
        return view('livewire.listkampus',[
            'campuses' => $campuses,
        ]);
    }
}
