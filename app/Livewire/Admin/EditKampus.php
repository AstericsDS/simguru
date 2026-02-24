<?php

namespace App\Livewire\Admin;

use App\Models\Campus;
use App\Models\Update;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


#[Layout('components.layouts.admin.dashboard')]
class EditKampus extends Component
{
    use WithFileUploads;
    public ?Campus $campus = null;
    public ?Update $update = null;
    public $name, $address, $area_size, $contact, $description, $slug;
    public $images_path = [];
    public $documents_path = [];
    public $new_images = [];
    public $new_documents = [];
    public $new_data = [];
    public bool $is_pending;

    private function sameImages()
    {
        $existing = array_map('strval', $this->campus->images_path ?? []);
        $current = array_map(function ($img) {
            return $img instanceof \Illuminate\Http\UploadedFile ? $img->getClientOriginalName() : $img;
        }, $this->images_path);

        return $existing == $current;
    }

    private function sameDocuments()
    {
        $existing = array_map('strval', $this->campus->documents_path ?? []);
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
            $this->campus = Campus::where('slug', $id)->first();

            if ($this->campus) {
                $this->update = Update::where('table', 'campuses')->where('record_id', $this->campus->id)->first();
            }
        }
        $this->new_data = $this->update->new_data;
        $this->name = $this->new_data['name'] ?? $this->campus->name;
        $this->slug = $this->new_data['slug'] ?? $this->campus->slug;
        $this->address = $this->new_data['address'] ?? $this->campus->address;
        $this->area_size = $this->new_data['area_size'] ?? $this->campus->area_size;
        $this->contact = $this->new_data['contact'] ?? $this->campus->contact;
        $this->description = $this->new_data['description'] ?? $this->campus->description;
        $this->images_path = $this->new_data['images_path'] ?? $this->campus->images_path;
        $this->documents_path = $this->new_data['documents_path'] ?? $this->campus->documents_path;
        $this->is_pending = $this->update->status === 'pending';
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'area_size' => 'required|integer',
            'contact' => 'required|digits_between:8,13',
            'description' => 'required',
            'new_images.*' => 'file|image|max:2048',
            'new_documents.*' => 'file|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'address.required' => 'Alamat harus diisi',
            'area_size.required' => 'Luas Kawasan harus diisi',
            'area_size.integer' => 'Luas Kawasan harus berupa angka',
            'contact.required' => 'Nomor telepon harus diisi',
            'contact.digits_between' => 'Nomor telepon harus berupa angka dan minimal 8 digit',
            'description.required' => 'Deskripsi harus diisi',
            'new_images.*.file' => 'Harus berupa file',
            'new_images.*.image' => 'File harus berupa gambar',
            'new_images.*.max' => 'Size maksimal adalah 2MB',
            'new_documents.*.file' => 'Harus berupa file',
            'new_documents.*.mimes' => 'File harus berupa pdf, doc, docs, xls, atau xlsx',
            'new_documents.*.max' => 'Size maksimal adalah 5MB',
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

        $updated = $this->update->update([
            'old_data' => $this->update->new_data,
            'new_data' => $validated,
            'type' => 'modify',
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
            $this->name === ($this->campus?->name ?? $this->new_data['name']) &&
            $this->address === ($this->campus?->address ?? $this->new_data['address']) &&
            $this->area_size === ($this->campus?->area_size ?? $this->new_data['area_size']) &&
            $this->contact === ($this->campus?->contact ?? $this->new_data['contact']) &&
            $this->description === ($this->campus->description ?? $this->new_data['description']) &&
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
        return view('livewire.admin.edit-kampus');
    }
}
