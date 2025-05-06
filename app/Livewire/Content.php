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
                    'nama' => 'Gedung A',
                    'lantai' => [
                        [
                            'id' => 1,
                            'nama' => 'Lantai 1',
                            'ruangan' => [
                                ['id' => 1, 'nama' => 'Ruang 101'],
                            ]
                        ],
                        [
                            'id' => 2,
                            'nama' => 'Lantai 2',
                            'ruangan' => [
                                ['id' => 2, 'nama' => 'Ruang 201'],
                            ]
                        ],
                    ]
                ],
            ]
        ],
        [
            'id' => 2,
            'nama' => 'Kampus B',
            'gedung' => [
                [
                    'id' => 2,
                    'nama' => 'Gedung A',
                    'lantai' => [
                        [
                            'id' => 3,
                            'nama' => 'Lantai 1',
                            'ruangan' => [
                                ['id' => 3, 'nama' => 'Ruang 101'],
                            ]
                        ],
                        [
                            'id' => 4,
                            'nama' => 'Lantai 2',
                            'ruangan' => [
                                ['id' => 4, 'nama' => 'Ruang 201'],
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
    public $search = '';

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