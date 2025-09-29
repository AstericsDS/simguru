<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Campus;
use App\Models\Update;
use Livewire\Component;
use App\Models\Building;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

#[Layout('components.layouts.admin.dashboard')]
class DaftarRuang extends Component
{
    use WithFileUploads;
    public Room $selectedRoom;
    public $name, $campus_id, $building_id, $floor, $capacity, $category, $area, $description, $slug;
    public $buildings = [];
    public $campuses = [];
    public $search = '';
    public $images_path = [];
    public $documents_path = [];
    public $room_images = [];
    public $rejected_rooms = [];
    public $inventory = [];

    public function rules()
    {
        return [
            'name' => 'required|unique:rooms,name',
            'slug' => 'required',
            'campus_id' => 'required',
            'building_id' => 'required',
            'floor' => 'required',
            'capacity' => 'required|integer',
            'category' => 'required',
            'area' => 'required|integer',
            'description' => 'required',
            'images_path' => 'required|array',
            'images_path.*' => 'file|image',
            'documents_path' => 'required|array',
            'documents_path.*' => 'file|mimes:pdf,doc,docx,xls,xlsx',
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
            'images_path.required' => 'Foto harus diupload',
            'images_path.*.image' => 'Foto harus berupa gambar',
            'documents_path.required' => 'Dokumen harus diupload',
            'documents_path.*.mimes' => 'File harus berupa pdf, doc, docs, xls, atau xlsx',
            'inventory.*.name.required' => 'Nama barang harus diisi',
            'inventory.*.name.string' => 'Nama barang harus berupa string',
            'inventory.*.quantity.required' => 'Kuantitas barang harus diisi',
            'inventory.*.quantity.integer' => 'Kuantitas barang harus berupa angka',
            'inventory.*.quantity.min' => 'Kuantitas barang minimal 1',
        ];
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }
    public function save()
    {
        if (empty($this->inventory)) {
            $validated = collect($this->validate(Arr::except($this->rules(), ['inventory.*.name', 'inventory.*.quantity'])));
            $validated['inventory'] = [];
        } else {
            $validated = collect($this->validate());
        }
        
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
        $validated['building'] = Building::find($this->building_id)->name;
        $created = Update::create([
            'admin_id' => Auth::id(),
            'type' => 'new',
            'table' => 'rooms',
            'record_id' => null,
            'old_data' => null,
            'new_data' => $validated,
            'status' => 'pending',
            'approved_by' => null,
            'reject_reason' => null,
        ]);
        if ($created) {
            $this->reset(['name', 'capacity', 'area', 'description', 'images_path', 'documents_path']);
            $this->dispatch('close-modal');
            $this->dispatch('toast', status: 'success', message: 'Entri anda telah masuk dan akan segera diverifikasi.');
        } else {
            $this->dispatch('close-modal');
            $this->dispatch('toast', status: 'fail', message: 'Maaf, entri anda tidak dapat diterima. Silakan coba lagi.');
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
        $this->category = 'class';

        if ($this->campuses->isNotEmpty()) {
            $this->campus_id = $this->campuses->first()->id;
            $this->buildings = Building::where('campus_id', $this->campus_id)->get();

            if ($this->buildings->isNotEmpty()) {
                $this->building_id = $this->buildings->first()->id;
                $this->floor = $this->buildings->first()->floor;
            }
        }

        $this->rejected_rooms = array_merge($this->rejected_rooms, Update::where('table', 'rooms')->where('status', 'rejected')->pluck('record_id')->toArray());
    }

    public function view($id)
    {
        $this->selectedRoom = Room::find($id);
        $this->room_images = $this->selectedRoom->images_path;
        $this->dispatch('view');
    }

    public function viewPending($id)
    {
        $pending = Update::find($id);
        $this->room_images = $pending->new_data['images_path'];
        $this->dispatch('view');
    }

    public function render()
    {
        $rooms = Room::when($this->search !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->search . '%'))->with('campus', 'building')->paginate(10);
        $updates = Update::when(
            $this->search !== '',
            fn(Builder $query) => $query->where('new_data->name', 'like', '%' . $this->search . '%')
        )->where('table', 'rooms')->whereIn('status', ['pending', 'rejected'])->get();
        return view('livewire.admin.daftar-ruang', [
            'rooms' => $rooms,
            'updates' => $updates,
        ]);
    }
}
