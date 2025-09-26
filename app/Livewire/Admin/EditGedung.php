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
    public $documents_path = [];
    public $new_images = [];
    public $new_data = [];
    public $new_documents = [];
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
    private function sameDocuments()
    {
        $existing = array_map('strval', $this->building->documents_path ?? []);
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
        $this->documents_path = $this->new_data['documents_path'] ?? $this->building->documents_path;
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
            'new_images.*' => 'file|image',
            'new_documents.*' => 'file|mimes:pdf,doc,docx,xls,xlsx',
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
            'new_images.*.file' => 'Harus berupa file',
            'new_images.*.image' => 'File harus berupa gambar',
            'new_documents.*.file' => 'Harus berupa file',
            'new_documents.*.mimes' => 'File harus berupa pdf, doc, docs, xls, atau xlsx',
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

        $validated = $this->validate();
        $validated['images_path'] = $finalImgPaths;
        $validated['documents_path'] = $finalDocPaths;
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
            $this->name === ($this->building->name ?? $this->update->new_data['name']) &&
            $this->campus_id === ($this->building->campus_id ?? $this->update->new_data['campus_id']) &&
            $this->area === ($this->building->area ?? $this->update->new_data['area']) &&
            $this->floor == ($this->building->floor ?? $this->update->new_data['floor']) &&
            $this->address === ($this->building->address ?? $this->update->new_data['address']) &&
            $this->description === ($this->building->description ?? $this->update->new_data['description']) &&
            $this->sameImages() &&
            $this->sameDocuments()
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
