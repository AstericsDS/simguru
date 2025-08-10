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
use function PHPUnit\Framework\returnArgument;

#[Layout('components.layouts.admin.dashboard')]
class EditRuang extends Component
{
    use WithFileUploads;
    public Room $room;
    public Update $update;
    public $name, $campus_id, $building_id, $floor, $capacity, $category, $description, $area;
    public $images_path = [];
    public $new_images = [];
    public $new_data = [];
    public bool $is_pending;
    public $campuses = [];
    public $buildings = [];
    private function sameImages()
    {
        $existing = array_map('strval', $this->room->images_path ?? []);
        $current = array_map(function ($img) {
            return $img instanceof \Illuminate\Http\UploadedFile ? $img->getClientOriginalName() : $img;
        }, $this->images_path);

        return $existing == $current;
    }

    public function mount(Room $room)
    {
        $this->room = $room;
        $this->update = Update::where('table', 'rooms')->where('record_id', $this->room->id)->first();
        if (!$this->update) {
            return $this->redirectRoute('daftar-ruang', navigate: true);
        }
        $this->new_data = json_decode($this->update->new_data, true);
        $this->name = $this->new_data['name'] ?? $room->name;
        $this->campus_id = $this->new_data['campus_id'] ?? $room->campus_id;
        $this->building_id = $this->new_data['building_id'] ?? $room->building_id;
        $this->floor = $this->new_data['floor'] ?? $room->floor;
        $this->area = $this->new_data['area'] ?? $room->area;
        $this->capacity = $this->new_data['capacity'] ?? $room->capacity;
        $this->category = $this->new_data['category'] ?? $room->category;
        $this->description = $this->new_data['description'] ?? $room->description;
        $this->images_path = $this->new_data['images_path'] ?? $room->images_path;
        $this->is_pending = $this->update->status === 'pending';
        $this->campuses = Campus::all();
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
            $this->name === $this->room->name &&
            $this->campus_id === $this->room->campus_id &&
            $this->building_id === $this->room->building_id &&
            $this->floor == $this->room->floor &&
            $this->capacity == $this->room->capacity &&
            $this->category === $this->room->category &&
            $this->description === $this->room->description &&
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
        return view('livewire.admin.edit-ruang');
    }
}
