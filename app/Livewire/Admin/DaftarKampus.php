<?php

namespace App\Livewire\Admin;

use App\Models\Update;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Campus;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

#[Layout('components.layouts.admin.dashboard')]
class DaftarKampus extends Component
{
    use WithFileUploads;

    public $name, $address, $contact, $description, $slug;
    public $images_path = [];
    public $documents_path = [];
    public $search = '';
    public $campusImages = [];
    public $rejected_campuses = [];
    public Campus $selectedCampus;
    public ?Update $selectedUpdate = null;

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:campuses,name',
            'slug' => 'required',
            'address' => 'required',
            'area_size' => 'required|integer',
            'contact' => 'required|digits_between:8,13',
            'description' => 'required',
            'images_path' => 'required|array',
            'images_path.*' => 'file|image|max:2048',
            'documents_path' => 'required|array',
            'documents_path.*' => 'file|mimes:pdf,doc,docx,xls,xlsx|max:5120'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'address.required' => 'Alamat harus diisi',
            'area_size.required' => 'Luas bangunan harus diisi',
            'area_size.integer' => 'Luas bangunan harus berupa angka',
            'contact.required' => 'Nomor telepon harus diisi',
            'contact.digits_between' => 'Nomor telepon harus berupa angka dan minimal 8 digit',
            'description.required' => 'Deskripsi harus diisi',
            'images_path.required' => 'Foto harus diupload',
            'new_images.*.max' => 'Size maksimal adalah 2MB',
            'images_path.*.image' => 'Foto harus berupa gambar',
            'documents_path.required' => 'Dokumen harus diupload',
            'documents_path.*.mimes' => 'File harus berupa pdf, doc, docs, xls, atau xlsx',
            'new_documents.*.max' => 'Size maksimal adalah 5MB',
        ];
    }

    public function mount()
    {
        $this->rejected_campuses = array_merge($this->rejected_campuses, Update::where('table', 'campuses')->where('status', 'rejected')->pluck('record_id')->toArray());
    }

    public function save()
    {
        $validated = $this->validate();
        $img_paths = [];
        $doc_paths = [];
        if ($this->images_path && is_array($this->images_path)) {
            foreach ($this->images_path as $image) {
                $img_paths[] = $image->store('temp', 'public');
            }
            $validated['images_path'] = $img_paths;
        }
        if ($this->documents_path && is_array($this->documents_path)) {
            foreach ($this->documents_path as $document) {
                $originalName = $document->getClientOriginalName();
                $doc_paths[] = $document->storeAs('temp', $originalName, 'public');
            }
            $validated['documents_path'] = $doc_paths;
        }

        $validated['admin_id'] = Auth::id();
        $validated['slug'] = $this->slug;
        $created = Update::create([
            'admin_id' => Auth::id(),
            'type' => 'new',
            'table' => 'campuses',
            'record_id' => null,
            'old_data' => null,
            'new_data' => $validated,
            'status' => 'pending',
            'approved_by' => null,
            'reject_reason' => null,
        ]);
        if ($created) {
            $this->reset(['name', 'address', 'area_size', 'contact', 'description', 'images_path', 'documents_path']);
            $this->dispatch('close-modal');
            $this->dispatch('toast', status: 'success', message: 'Entri anda telah masuk dan akan segera diverifikasi.');
        } else {
            $this->dispatch('close-modal');
            $this->dispatch('toast', status: 'fail', message: 'Maaf, entri anda tidak dapat diterima. Silakan coba lagi.');
        }
    }

    public function deleteCampus()
    {
        $update = $this->selectedUpdate->update(['type' => 'delete', 'status' => 'pending']);
        if($update) {
            $this->dispatch('confirm-delete');
            $this->dispatch('toast', status: 'success', message: 'Permintaan telah diterima dan akan segera diverifikasi.');
            return;
        } else {
            $this->dispatch('confirm-delete');
            $this->dispatch('toast', status: 'fail', message: 'Maaf, permintaan tidak dapat diterima. Silahkan coba lagi.');
            return;
        }

    }

    public function deleteModal($id)
    {
        $this->selectedUpdate = Update::where('table', 'campuses')->where('record_id', $id)->first();
        $this->dispatch('confirm-delete');
    }

    public function view($id)
    {
        $this->selectedCampus = Campus::find($id);
        $this->campusImages = $this->selectedCampus->images_path;
        $this->dispatch('view');
    }

    public function viewPending($id)
    {
        $pending = Update::find($id);
        $this->campusImages = $pending->new_data['images_path'];
        $this->dispatch('view');
    }

    public function render()
    {
        $campuses = Campus::when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->get();
        $updates = Update::when(
            $this->search !== '',
            fn(Builder $query) => $query->where('new_data->name', 'like', '%' . $this->search . '%')
        )->where('table', 'campuses')->whereIn('status', ['pending', 'rejected'])->get();
        return view('livewire.admin.daftar-kampus', [
            'campuses' => $campuses,
            'updates' => $updates
        ]);
    }
}
