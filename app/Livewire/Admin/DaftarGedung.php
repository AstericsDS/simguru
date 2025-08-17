<?php

namespace App\Livewire\Admin;

use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Update;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

#[Layout('components.layouts.admin.dashboard')]
class DaftarGedung extends Component
{
    use WithPagination;
    use WithFileUploads;
    public Building $selectedBuilding;

    public $name, $address, $floor, $area, $description, $campus_id, $slug;
    public $search = '';
    public $campuses = [];
    public $images_path = [];
    public $buildingImages = [];

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|unique:buildings,slug',
            'address' => 'required',
            'floor' => 'required|integer',
            'area' => 'required|integer',
            'description' => 'required',
            'campus_id' => 'required',
            'images_path.*' => 'required|file|image',
            'images_path' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama gedung harus diisi',
            'address.required' => 'Alamat harus diisi',
            'floor.required' => 'Jumlah lantai harus diisi',
            'area.required' => 'Luas gedung harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'campus_id.required' => 'Harus pilih salah satu kampus',
            'floor.integer' => 'Jumlah lantai harus berupa angka',
            'area.integer' => 'Luas area harus berupa angka',
            'images_path.required' => 'Foto harus diupload',
            'images_path.image' => 'Foto harus berupa gambar',
        ];
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $validated = $this->validate();
        $paths = [];
        if ($this->images_path && is_array($this->images_path)) {
            foreach ($this->images_path as $image) {
                $paths[] = $image->store('temp', 'public');
            }
            $validated['images_path'] = $paths;
        }

        $validated['admin_id'] = Auth::id();
        $validated['slug'] = $this->slug;
        $created = Update::create([
            'admin_id' => Auth::id(),
            'type' => 'new',
            'table' => 'buildings',
            'record_id' => null,
            'old_data' => null,
            'new_data' => json_encode($validated),
            'status' => 'pending',
            'approved_by' => null,
            'reject_reason' => null,
        ]);

        if ($created) {
            $this->reset(['name', 'address', 'floor', 'area', 'description', 'images_path']);
            $this->dispatch('close-modal');
            $this->dispatch('toast', status: 'success', message: 'Entri anda telah masuk dan akan segera diverifikasi.');
        } else {
            $this->dispatch('close-modal');
            $this->dispatch('toast', status: 'fail', message: 'Maaf, entri anda tidak dapat diterima. Silakan coba lagi.');
        }
    }

    public function updating($key): void
    {
        if ($key === 'search') {
            $this->resetPage();
        }
    }
    public function mount()
    {
        $this->campuses = Campus::all();
        $this->campus_id = $this->campuses->first()->id ?? null;
    }

    public function view($id)
    {
        $this->selectedBuilding = Building::find($id);
        $this->buildingImages = $this->selectedBuilding->images_path;
        $this->dispatch('view');
    }

    public function render()
    {
        $buildings = Building::with('campus')
            ->when($this->search !== '', fn(Builder $query)
                => $query->where('name', 'like', '%' . $this->search . '%'))
            ->paginate(10);
        return view('livewire.admin.daftar-gedung', [
            'buildings' => $buildings
        ]);
    }

}
