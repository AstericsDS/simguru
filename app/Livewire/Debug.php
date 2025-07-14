<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Building;

class Debug extends Component
{
    public Building $building;
    public function render()
    {
        // Using port 8001
        $response = Http::api()->get('/api/v1/buildings');

        $data = $response->json();
        // dd($data['data']);
        return view('livewire.debug', [
            'buildings' => $data['data'],
        ]);
    }
}
