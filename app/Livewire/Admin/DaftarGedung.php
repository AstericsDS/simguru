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
    public $documents_path = [];
    public $buildingImages = [];
    public $rejected_buildings = [];
    public ?Update $selectedUpdate = null;

    public function rules()
    {
        return [
            'name' => 'required|unique:buildings,name',
            'slug' => 'required',
            'campus_id' => 'required',
            'address' => 'required',
            'floor' => 'required|integer',
            'area' => 'required|integer',
            'description' => 'required',
            'images_path' => 'required|array',
            'images_path.*' => 'file|image',
            'documents_path' => 'required|array',
            'documents_path.*' => 'file|mimes:pdf,doc,docx,xls,xlsx'
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
            'images_path.*.image' => 'Foto harus berupa gambar',
            'documents_path.required' => 'Dokumen harus diupload',
            'documents_path.*.mimes' => 'File harus berupa pdf, doc, docs, xls, atau xlsx'
        ];
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
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
        $validated['campus'] = Campus::find($this->campus_id)->name;
        $created = Update::create([
            'admin_id' => Auth::id(),
            'type' => 'new',
            'table' => 'buildings',
            'record_id' => null,
            'old_data' => null,
            'new_data' => $validated,
            'status' => 'pending',
            'approved_by' => null,
            'reject_reason' => null,
        ]);

        if ($created) {
            $this->reset(['name', 'address', 'floor', 'area', 'description', 'images_path', 'documents_path']);
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
        $this->rejected_buildings = array_merge($this->rejected_buildings, Update::where('table', 'buildings')->where('status', 'rejected')->pluck('record_id')->toArray());

    }

    public function view($id)
    {
        $this->selectedBuilding = Building::find($id);
        $this->buildingImages = $this->selectedBuilding->images_path;
        $this->dispatch('view');
    }

    public function viewPending($id)
    {
        $pending = Update::find($id);
        $this->buildingImages = $pending->new_data['images_path'];
        $this->dispatch('view');
    }
    public function deleteBuilding()
    {
        $update = $this->selectedUpdate->update(['type' => 'delete', 'status' => 'pending']);
        if ($update) {
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
        $this->selectedUpdate = Update::where('table', 'buildings')->where('record_id', $id)->first();
        $this->dispatch('confirm-delete');
    }

    public function render()
    {
        $buildings = Building::with('campus')
            ->when($this->search !== '', fn(Builder $query)
                => $query->where('name', 'like', '%' . $this->search . '%'))
            ->paginate(10);
        $updates = Update::when(
            $this->search !== '',
            fn(Builder $query) => $query->where('new_data->name', 'like', '%' . $this->search . '%')
        )->where('table', 'buildings')->whereIn('status', ['pending', 'rejected'])->get();
        return view('livewire.admin.daftar-gedung', [
            'buildings' => $buildings,
            'updates' => $updates,
        ]);
    }

}
