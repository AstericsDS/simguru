<?php

namespace App\Livewire;

use App\Models\Campus;
use Livewire\Component;
use App\Models\Building;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class TambahGedung extends Component
{
    use WithPagination;

    public $name, $address, $floor, $area, $description, $campus_id;
    public $status = 0;
    public $searchBar = '';

    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'floor' => 'required|integer',
            'area' => 'required|integer',
            'status' => 'required',
            'description' => 'required',
            'campus_id' => 'required'
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
            'area.integer' => 'Luas area harus berupa angka'
        ];
    }

    public function save()
    {
        $validate = $this->validate();
        Building::create($validate);
        $this->reset();
        return redirect()->route('tambah-gedung')->with('message', 'Gedung berhasil dibuat');
    }

    public function updating($key): void
    {
        if ($key === 'searchBar') {
            $this->resetPage();
        }
    }

    public function mount()
    {
        $this->campuses = Campus::all();

        // Automatically select the only campus
        if ($this->campuses->count() === 1) {
            $this->campus_id = $this->campuses->first()->id;
        }
    }

    public function render()
    {
        $building = Building::with('campus')
        ->when($this->searchBar !== '', fn(Builder $query) 
        => $query->where('name', 'like', '%' . $this->searchBar . '%'))
        ->paginate(10);

        return view('livewire.admin.tambah-gedung', [
            'campuses' => Campus::all(),
            'buildings' => $building
        ]);
    }

}
