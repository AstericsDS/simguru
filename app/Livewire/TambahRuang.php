<?php

namespace App\Livewire;

use App\Models\Room;
use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;
use App\Models\PendingUpdate;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithFileUploads;

#[Layout('components.layouts.admin.dashboard')]
class TambahRuang extends Component
{
    use WithFileUploads;

    public $name, $campus_id, $building_id, $floor, $capacity, $status, $area, $description;
    public $buildings = [];
    public $campuses = [];
    public $search = '';
    public $images_path = [];

    public function rules()
    {
        return [
            'name' => 'required',
            'campus_id' => 'required',
            'building_id' => 'required',
            'floor' => 'required',
            'capacity' => 'required|integer',
            'status' => 'required',
            'area' => 'required|integer',
            'description' => 'required',
            'images_path.*' => 'required|file|image',
            'images_path' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'campus_id.required' => 'Kampus harus dipilih',
            'building_id.required' => 'Gedung harus dipilih',
            'floor.required' => 'Lantai harus dipilih',
            'capacity.required' => 'Kapasitas harus dipilih',
            'capacity.integer' => 'Kapasitas harus berupa angka',
            'status.required' => 'Status harus dipilih',
            'area.required' => 'Area harus dipilih',
            'area.integer' => 'Area harus berupa angka',
            'description' => 'Deskripsi harus diisi',
            'images_path.required' => 'Foto harus diupload',
            'images_path.image' => 'Foto harus berupa gambar',
        ];
    }

    public function save()
    {
        $validated = collect($this->validate());
        $validated = $validated->except('campus_id');

        $paths = [];
        if ($this->images_path && is_array($this->images_path)) {
            foreach ($this->images_path as $image) {
                $paths[] = $image->store('temp');
            }
            $validated['images_path'] = $paths;
        }
        $validated['admin_id'] = Auth::id();
        $created = PendingUpdate::create([
            'admin_id' => Auth::id(),
            'type' => 'new',
            'table' => 'rooms',
            'record_id' => null,
            'old_data' => null,
            'new_data' => json_encode($validated),
            'status' => 'pending',
            'approved_by' => null,
            'reject_reason' => null,
        ]);
        if ($created) {
            $this->reset(['name', 'floor', 'capacity', 'area', 'description', 'images_path']);
            $this->dispatch('close-modal');
            $this->dispatch('show-toast', status: 'success', message: 'Entri anda telah masuk dan akan segera diverifikasi.');
        } else {
            $this->dispatch('close-modal');
            $this->dispatch('show-toast', status: 'fail', message: 'Maaf, entri anda tidak dapat diterima. Silakan coba lagi.');
        }
    }

    public function updatedCampusId($value)
    {
        $this->buildings = Building::where('campus_id', $value)->get();

        if ($this->buildings->isNotEmpty()) {
            $this->building_id = $this->buildings->first()->id;
            $this->floor = $this->buildings->first()->floor;
        } else {
            $this->building_id = null;
            $this->floor = null;
        }
    }

    public function updatedBuildingId($value)
    {
        $this->floor = Building::where('id', $value)->value('floor');
    }

    public function mount()
    {
        $this->campuses = Campus::all();
        $this->status = 'class';

        if ($this->campuses->isNotEmpty()) {
            $this->campus_id = $this->campuses->first()->id;
            $this->buildings = Building::where('campus_id', $this->campus_id)->get();

            if ($this->buildings->isNotEmpty()) {
                $this->building_id = $this->buildings->first()->id;
                $this->floor = $this->buildings->first()->floor;
            }
        }
    }


    public function render()
    {
        $rooms = Room::when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->paginate(10);
        return view('livewire.admin.tambah-ruang', [
            'rooms' => $rooms
        ]);
    }
}
