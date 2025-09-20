<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Campus;
use App\Models\Update;
use App\Models\Building;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin.dashboard')]
class ViewKampus extends Component
{
    public ?Campus $campus;
    public ?Update $pending;
    public Collection $buildings;
    // public function mount(Campus $campus)
    // {
    //     $this->campus = $campus;
    //     $this->buildings = Building::where('campus_id', $this->campus->id)->get();
    // }

    public function mount($id)
    {
        $this->campus = Campus::where('slug', $id)->first();
        $this->pending = Update::find($id);
        
        if (isset($this->campus)) {
            $this->buildings = Building::where('campus_id', $this->campus->id)->get();
        }
    }

    public function render()
    {
        return view('livewire.admin.view-kampus');
    }
}
