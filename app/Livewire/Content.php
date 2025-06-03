<?php

namespace App\Livewire;

use Livewire\Component;

class Content extends Component
{
    public $kampusList = [
        [
            'id' => 1,
            'nama' => 'Kampus A',
            'gedung' => [
                [
                    'id' => 1,
                    'nama' => 'Gedung Dewi Sartika',
                    'lantai' => [
                        [
                            'id' => 1,
                            'nama' => 'Lantai 1',
                            'ruangan' => [
                                ['id' => 1, 'nama' => 'Ruang 101'],
                            ]
                        ],
                    ]
                ],
            ]
        ],
    ];

    public $openKampus = [];
    public $openGedung = [];
    public $openLantai = [];

    public function toggleKampus($kampusId)
    {
        $this->openKampus[$kampusId] = !($this->openKampus[$kampusId] ?? false);
    }

    public function toggleGedung($gedungId)
    {
        $this->openGedung[$gedungId] = !($this->openGedung[$gedungId] ?? false);
    }

    public function toggleLantai($lantaiId)
    {
        $this->openLantai[$lantaiId] = !($this->openLantai[$lantaiId] ?? false);
    }

    public function render()
    {
        return view('livewire.content');
    }
}