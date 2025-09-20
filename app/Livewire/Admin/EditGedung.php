<?php

namespace App\Livewire\Admin;

use App\Models\Campus;
use App\Models\Update;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

#[Layout('components.layouts.admin.dashboard')]
class EditGedung extends Component
{
    use WithFileUploads;
    public Building $building;
    public Update $update;
    public $name, $campus_id, $area, $floor, $address, $description, $slug;
    public $images_path = [];
    public $new_images = [];
    public $new_data = [];
    public $campuses = [];
    public bool $is_pending;
    private function sameImages()
    {
        $existing = array_map('strval', $this->building->images_path ?? []);
        $current = array_map(function ($img) {
            return $img instanceof \Illuminate\Http\UploadedFile ? $img->getClientOriginalName() : $img;
        }, $this->images_path);

        return $existing == $current;
    }

    public function mount($id)
    {
        // Cek jika passing argument berupa id (untuk entri baru)
        if (is_numeric($id)) {
            $this->update = Update::find($id);
        }
        // Jika bukan id, berarti slug (untuk entri yang sudah pernah di approve)
        else {
            $this->building = Building::where('slug', $id)->first();

            if ($this->building) {
                $this->update = Update::where('table', 'buildings')->where('record_id', $this->building->id)->first();
            }
        }
        if (!$this->update) {
            return $this->redirectRoute('daftar-gedung', navigate: true);
        }
        $this->new_data = $this->update->new_data;
        $this->name = $this->new_data['name'] ?? $this->building->name;
        $this->campus_id = $this->new_data['campus_id'] ?? $this->building->campus_id;
        $this->area = $this->new_data['area'] ?? $this->building->area;
        $this->floor = $this->new_data['floor'] ?? $this->building->floor;
        $this->address = $this->new_data['address'] ?? $this->building->address;
        $this->description = $this->new_data['description'] ?? $this->building->description;
        $this->images_path = $this->new_data['images_path'] ?? $this->building->images_path;
        $this->campuses = Campus::all();
        $this->is_pending = $this->update->status === 'pending';
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'campus_id' => 'required',
            'area' => 'required|integer',
            'floor' => 'required|integer',
            'address' => 'required',
            'description' => 'required',
            'new_images.*' => 'file|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama gedung harus diisi',
            'campus_id.required' => 'Harus pilih salah satu kampus',
            'area.required' => 'Luas gedung harus diisi',
            'area.integer' => 'Luas area harus berupa angka',
            'floor.required' => 'Jumlah lantai harus diisi',
            'floor.integer' => 'Jumlah lantai harus berupa angka',
            'address.required' => 'Alamat harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'new_images.file' => 'Harus berupa file',
            'new_images.image' => 'File harus berupa gambar',
        ];
    }

    public function updatedNewImages()
    {
        foreach ($this->new_images as $image) {
            $this->images_path[] = $image; // append, don't overwrite
        }
        $this->new_images = []; // reset upload field
    }

    public function save()
    {
        $this->slug = Str::slug($this->name);
        $finalPaths = [];

        foreach ($this->images_path as $image) {
            if ($image instanceof \Illuminate\Http\UploadedFile) {
                // Store and push path
                $finalPaths[] = $image->store('temp', 'public');
            } else {
                // Keep existing path
                $finalPaths[] = $image;
            }
        }

        $validated = $this->validate();
        $validated['images_path'] = $finalPaths;
        $validated['admin_id'] = Auth::id();
        $validated['slug'] = $this->slug;
        $validated['campus'] = Campus::find($this->campus_id)->name;

        $updated = $this->update->update([
            'old_data' => $this->update->new_data,
            'new_data' => $validated,
            'status' => 'pending',
            'updated_at' => now(),
        ]);

        if ($updated) {
            $this->dispatch('toast', status: 'success', message: 'Perubahan telah disimpan.');
            $this->dispatch('modal');
            $this->is_pending = true;
        } else {
            $this->dispatch('toast', status: 'fail', message: 'Perubahan gagal disimpan.');
        }
    }

    public function removeImage($index)
    {
        if ($this->is_pending) {
            return;
        }
        unset($this->images_path[$index]);
        $this->images_path = array_values($this->images_path);
    }

    public function showModal()
    {
        if ($this->is_pending) {
            return;
        }
        if (
            $this->name === ($this->building->name ?? $this->update->new_data['name']) &&
            $this->campus_id === ($this->building->campus_id ?? $this->update->new_data['campus_id']) &&
            $this->area === ($this->building->area ?? $this->update->new_data['area']) &&
            $this->floor == ($this->building->floor ?? $this->update->new_data['floor']) &&
            $this->address === ($this->building->address ?? $this->update->new_data['address']) &&
            $this->description === ($this->building->description ?? $this->update->new_data['description']) &&
            $this->sameImages()
        ) {
            $this->dispatch('toast', status: 'nochanges', message: 'Tidak ada value yang diubah.');
            return;
        } else {
            $this->dispatch('modal');
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-gedung');
    }
}
