<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $total = 0;
    public $available = 0;
    public $chartLabels = ['GDS', 'GRK', 'GE', 'Tower 1A', 'Tower 1B', 'FIS'];
    public $chartData = [2, 3, 1, 2, 2, 2];

    public function create() { /* ... */ }
    public function edit() { /* ... */ }
    public function delete() { /* ... */ }
    
    public function render()
    {
        return view('livewire.dashboard');
    }
}
