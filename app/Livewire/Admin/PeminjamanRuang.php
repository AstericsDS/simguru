<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Campus;
use App\Models\Building;
// use Illuminate\Container\Attributes\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;

#[Layout('components.layouts.admin.dashboard')]
class PeminjamanRuang extends Component
{
    use WithPagination;

    public ?int $campus_id = null;
    public ?int $building_id = null;
    public $category = null;
    public string $search = '';
    public function updatingCategory()
    {
        $this->resetPage();
    }

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
        $this->category = null;
    }
    public function render()
    {
        $query = Room::query();
        $user = Auth::id();

        if ($this->building_id) {
            $query->where('building_id', $this->building_id);
        } elseif ($this->campus_id) {
            $query->where('campus_id', $this->campus_id);
        }

        if ($this->search !== '') {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

<<<<<<< HEAD
        $query->where('admin_id', $user);
=======
        if (empty($this->category)){
            $query->where('admin_id', $user);
        } else {
            $query->where('category', $this->category)->where('admin_id', $user);
        }
>>>>>>> feature/admin-system

        return view('livewire.admin.peminjaman-ruang', [
            'campuses'  => Campus::all(),
            'buildings' => $this->campus_id
                ? Building::where('campus_id', $this->campus_id)->get()
                : collect(),
            'rooms'     => $query->paginate(10),
        ]);
    }
}
