<?php

namespace App\Livewire;

use App\Models\Campus;
use Livewire\Component;
use App\Models\PendingUpdate;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithFileUploads;

#[Layout('components.layouts.admin.dashboard')]
class TambahKampus extends Component
{
    use WithFileUploads;

    public $name, $address, $contact, $email, $description;
    public $images_path = [];
    public $search = '';

    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required|min:8',
            'email' => 'required|email',
            'description' => 'required',
            'images_path.*' => 'required|file|image',
            'images_path' => 'required|array',
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
            'images_path.required' => 'Foto harus diupload',
            'images_path.image' => 'Foto harus berupa gambar',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
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
            'table' => 'campuses',
            'record_id' => null,
            'old_data' => null,
            'new_data' => json_encode($validated),
            'status' => 'pending',
            'approved_by' => null,
            'reject_reason' => null,
        ]);
        if ($created) {
            $this->reset(['name', 'address', 'contact', 'email', 'description', 'images_path']);
            $this->dispatch('close-modal');
            $this->dispatch('show-toast', status: 'success', message: 'Entri anda telah masuk dan akan segera diverifikasi.');
        } else {
            $this->dispatch('close-modal');
            $this->dispatch('show-toast', status: 'fail', message: 'Maaf, entri anda tidak dapat diterima. Silakan coba lagi.');
        }
    }

    public function test()
    {
        $this->dispatch('show-toast', status: 'success', message: 'Entri anda telah masuk dan akan segera diverifikasi.');
    }

    public function test2()
    {
        $this->dispatch('show-toast', status: 'fail', message: 'Maaf, entri anda tidak dapat diterima. Silakan coba lagi.');
    }

    public function mount()
    {

    }

    public function render()
    {
        $campuses = Campus::when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->get();
        return view('livewire.admin.tambah-kampus', [
            'campuses' => $campuses
        ]);
    }
}
