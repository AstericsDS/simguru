<?php

namespace App\Services;

use App\Models\Campus;
use App\Models\Building;

class UpdateService
{
    public static function transform($update)
    {

        $parsed_new = collect($update->new_data);
        $parsed_old = collect($update->old_data) ?? [];

        $labelMaps = [
            'campuses' => [
                'name' => 'Nama',
                'address' => 'Alamat',
                'contact' => 'Kontak',
                'email' => 'Email',
                'description' => 'Deskripsi',
            ],
            'buildings' => [
                'name' => 'Nama',
                'campus_id' => fn($v) => ['Kampus' => Campus::find($v)->name ?? 'Null'],
                'area' => 'Luas',
                'floor' => 'Lantai',
                'description' => 'Deskripsi',
                'address' => 'Alamat',
            ],
            'rooms' => [
                'name' => 'Nama',
                'building_id' => fn($v) => ['Gedung' => Building::find($v)->name ?? 'Null'],
                'floor' => 'Lantai',
                'capacity' => 'Kapasitas',
                'description' => 'Deskripsi',
                'category' => function($v) {
                    $labels = [
                        'class' => 'Kelas',
                        'office' => 'Kantor',
                        'laboratory' => 'Laboratorium',
                        'general' => 'Umum',
                        'open_space' => 'Ruang Terbuka',
                        'internal_unj' => 'Internal UNJ'
                    ];
                    return ['Kategori' => $labels[$v] ?? $v];
                },
                'length' => fn($v) => ['Panjang' => $v . 'm'],
                'width' => fn($v) => ['Lebar' => $v . 'm'],
                'height' => fn($v) => ['Tinggi' => $v . 'm'],
                'rentable' => fn($v) => ['Tipe Sewa' => $v ? 'Disewakan' : 'Tidak Disewakan'],
                'show' => fn($v) => ['Tipe Visibilitas' => $v ? 'Publik' : 'Privat']
            ],
        ];

        $map_new = $labelMaps[$update->table] ?? [];
        $update->parsed_new_data = $parsed_new
            ->mapWithKeys(function ($value, $key) use ($map_new) {
                if (!isset($map_new[$key]))
                    return [];

                $label = $map_new[$key];
                return is_callable($label)
                    ? $label($value)
                    : [$label => $value];
            })
            ->toArray();
        
        $map_old = $labelMaps[$update->table] ?? [];
        $update->parsed_old_data = $parsed_old->mapWithKeys(function($value, $key) use ($map_old) {
            if (!isset($map_old[$key]))
                return [];

            $label = $map_old[$key];
            return is_callable($label)
                ? $label($value)
                : [$label => $value];
        })->toArray();

        return $update;
    }
}