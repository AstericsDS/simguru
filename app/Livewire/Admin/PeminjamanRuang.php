<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Campus;
use App\Models\Building;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

#[Layout('components.layouts.admin.dashboard')]
class PeminjamanRuang extends Component
{
    use WithPagination;

    public ?int $campus_id = null;
    public ?int $building_id = null;
    public string $search = '';

    public function updatingCampusId()
    {
        $this->resetPage();
        $this->building_id = null; // reset building when campus changes
    }

    public function updatingBuildingId()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function clearFilter()
    {
        $this->campus_id = null;
        $this->building_id = null;
    }
    public function render()
    {
        $query = Room::query();

        if ($this->building_id) {
            $query->where('building_id', $this->building_id);
        } elseif ($this->campus_id) {
            $query->where('campus_id', $this->campus_id);
        }

        if ($this->search !== '') {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $query->where('category', '!=','not_class');

        return view('livewire.admin.peminjaman-ruang', [
            'campuses'  => Campus::all(),
            'buildings' => $this->campus_id
                ? Building::where('campus_id', $this->campus_id)->get()
                : collect(),
            'rooms'     => $query->paginate(10),
        ]);
    }
}
