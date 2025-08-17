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
    public Campus $campus;
    public Update $update;
    public $name, $address, $contact, $email, $description, $slug;
    public $images_path = [];
    public $new_images = [];
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

    public function mount(Campus $campus)
    {
        $this->campus = $campus;
        $this->update = Update::where('table', 'campuses')->where('record_id', $this->campus->id)->first();
        if (!$this->update) {
            return $this->redirectRoute('daftar-kampus', navigate: true);
        }
        $this->new_data = json_decode($this->update->new_data, true);
        $this->name = $this->new_data['name'] ?? $campus->name;
        $this->slug = $this->new_data['slug'] ?? $campus->slug;
        $this->address = $this->new_data['address'] ?? $campus->address;
        $this->contact = $this->new_data['contact'] ?? $campus->contact;
        $this->email = $this->new_data['email'] ?? $campus->email;
        $this->description = $this->new_data['description'] ?? $campus->description;
        $this->images_path = $this->new_data['images_path'] ?? $campus->images_path;
        $this->is_pending = $this->update->status === 'pending';
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required|min:8',
            'email' => 'required|email',
            'description' => 'required',
            'new_images.*' => 'file|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'address.required' => 'Alamat harus diisi',
            'contact.required' => 'Nomor telepon harus diisi',
            'contact.min' => 'Nomor telepon minimal 8 digit',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Masukkan alamat email yang valid',
            'description.required' => 'Deskripsi harus diisi',
            'new_images.file' => 'Harus berupa file',
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

        $updated = $this->update->update([
            'old_data' => $this->update->new_data,
            'new_data' => json_encode($validated),
            'status' => 'pending'
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
            $this->name === $this->campus->name &&
            $this->address === $this->campus->address &&
            $this->contact === $this->campus->contact &&
            $this->email === $this->campus->email &&
            $this->description === $this->campus->description &&
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
        return view('livewire.admin.edit-kampus');
    }
}
