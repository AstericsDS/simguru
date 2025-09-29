<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Campus;
use App\Models\Update;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

#[Layout('components.layouts.admin.dashboard')]
class EditRuang extends Component
{
    use WithFileUploads;
    public Room $room;
    public Update $update;
    public $name, $campus_id, $building_id, $floor, $capacity, $category, $description, $area, $slug;
    public $images_path = [];
    public $documents_path = [];
    public $new_images = [];
    public $new_documents = [];
    public $new_data = [];
    public bool $is_pending;
    public $campuses = [];
    public $buildings = [];
    public ?array $inventory = null;
    private function sameImages()
    {
        $existing = array_map('strval', $this->room->images_path ?? []);
        $current = array_map(function ($img) {
            return $img instanceof \Illuminate\Http\UploadedFile ? $img->getClientOriginalName() : $img;
        }, $this->images_path);

        return $existing == $current;
    }

    private function sameDocuments()
    {
        $existing = array_map('strval', $this->room->documents_path ?? []);
        $current = array_map(function ($doc) {
            return $doc instanceof \Illuminate\Http\UploadedFile ? $doc->getClientOriginalName() : $doc;
        }, $this->documents_path);

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
            $this->room = Room::where('slug', $id)->first();

            if ($this->room) {
                $this->update = Update::where('table', 'rooms')->where('record_id', $this->room->id)->first();
            }
        }
        if (!$this->update) {
            return $this->redirectRoute('daftar-gedung', navigate: true);
        }

        $this->new_data = $this->update->new_data;
        $this->name = $this->new_data['name'] ?? $this->room->name;
        $this->campus_id = $this->new_data['campus_id'] ?? $this->room->campus_id;
        $this->building_id = $this->new_data['building_id'] ?? $this->room->building_id;
        $this->floor = $this->new_data['floor'] ?? $this->room->floor;
        $this->area = $this->new_data['area'] ?? $this->room->area;
        $this->capacity = $this->new_data['capacity'] ?? $this->room->capacity;
        $this->category = $this->new_data['category'] ?? $this->room->category;
        $this->description = $this->new_data['description'] ?? $this->room->description;
        $this->images_path = $this->new_data['images_path'] ?? $this->room->images_path;
        $this->documents_path = $this->new_data['documents_path'] ?? $this->room->documents_path;
        $this->is_pending = $this->update->status === 'pending';
        $this->campuses = Campus::all();
        $this->inventory = $this->new_data['inventory'] ?? $this->room->inventory;
        $this->loadBuildings();
    }

    public function updatedCampusId($value)
    {
        $this->loadBuildings();
        $this->building_id = null; // reset building selection if campus changes
    }

    private function loadBuildings()
    {
        $this->buildings = Building::where('campus_id', $this->campus_id)->get();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'campus_id' => 'required',
            'building_id' => 'required',
            'floor' => 'required',
            'capacity' => 'required|integer',
            'category' => 'required',
            'area' => 'required|integer',
            'description' => 'required',
            'new_images.*' => 'file|image',
            'new_documents.*' => 'file|mimes:pdf,doc,docx,xls,xlsx',
            'inventory.*.name' => 'required|string',
            'inventory.*.quantity' => 'required|integer|min:1',
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
            'category.required' => 'Kategori harus dipilih',
            'area.required' => 'Luas harus diisi',
            'area.integer' => 'Area harus berupa angka',
            'description' => 'Deskripsi harus diisi',
            'new_images.*.file' => 'Harus berupa file',
            'new_images.*.image' => 'File harus berupa gambar',
            'new_documents.*.file' => 'Harus berupa file',
            'new_documents.*.mimes' => 'File harus berupa pdf, doc, docs, xls, atau xlsx',
            'inventory.*.name.required' => 'Nama barang harus diisi',
            'inventory.*.name.string' => 'Nama barang harus berupa string',
            'inventory.*.quantity.required' => 'Kuantitas barang harus diisi',
            'inventory.*.quantity.integer' => 'Kuantitas barang harus berupa angka',
            'inventory.*.quantity.min' => 'Kuantitas barang minimal 1',
        ];
    }

    public function updatedNewImages()
    {
        if ($this->is_pending === true)
            return;
        $this->validateOnly('new_images.*');
        foreach ($this->new_images as $image) {
            $this->images_path[] = $image;
        }
        $this->new_images = [];
    }
    public function updatedNewDocuments()
    {
        if ($this->is_pending === true)
            return;
        $this->validateOnly('new_documents.*');
        foreach ($this->new_documents as $document) {
            $this->documents_path[] = $document;
        }
        $this->new_documents = [];
    }

    public function save()
    {
        if ($this->is_pending === true)
            return;

        $this->slug = Str::slug($this->name);
        $finalImgPaths = [];
        $finalDocPaths = [];

        foreach ($this->images_path as $image) {
            if ($image instanceof \Illuminate\Http\UploadedFile) {
                // Store and push path
                $finalImgPaths[] = $image->store('temp', 'public');
            } else {
                // Keep existing path
                $finalImgPaths[] = $image;
            }
        }

        foreach ($this->documents_path as $document) {
            if ($document instanceof \Illuminate\Http\UploadedFile) {
                // Store and push path
                $originalName = $document->getClientOriginalName();
                $finalDocPaths[] = $document->storeAs('temp', $originalName, 'public');
            } else {
                // Keep existing path
                $finalDocPaths[] = $document;
            }
        }


        try {
            $validated = $this->validate();
            $validated['images_path'] = $finalImgPaths;
            $validated['documents_path'] = $finalDocPaths;
            $validated['admin_id'] = Auth::id();
            $validated['slug'] = $this->slug;
            $validated['campus'] = Campus::find($this->campus_id)->name;
            $validated['building'] = Building::find($this->building_id)->name;

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
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('modal');
            $this->dispatch('toast', status: 'fail', message: 'Input data ada yang salah, silahkan cek lagi.');

            throw $e;
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

    public function removeDocument($index)
    {
        if ($this->is_pending) {
            return;
        }
        unset($this->documents_path[$index]);
        $this->documents_path = array_values($this->documents_path);
    }

    public function showModal()
    {
        if ($this->is_pending) {
            return;
        }

        if (
            $this->name === ($this->room->name ?? $this->new_data['name']) &&
            $this->campus_id === ($this->room->campus_id ?? $this->new_data['campus_id']) &&
            $this->building_id === ($this->room->building_id ?? $this->new_data['building_id']) &&
            $this->floor == ($this->room->floor ?? $this->new_data['floor']) &&
            $this->capacity == ($this->room->capacity ?? $this->new_data['capacity']) &&
            $this->category === ($this->room->category ?? $this->new_data['category']) &&
            $this->description === ($this->room->description ?? $this->new_data['description']) &&
            $this->sameImages() &&
            $this->sameDocuments() &&
            $this->inventory === ($this->room->inventory ?? $this->new_data['inventory'])
        ) {
            $this->dispatch('toast', status: 'nochanges', message: 'Tidak ada value yang diubah.');
            return;
        } else {
            $this->dispatch('modal');
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-ruang');
    }
}
