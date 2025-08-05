<?php

namespace App\Services;

use App\Models\Campus;
use App\Models\Building;

class UpdateService
{
    public static function transform($update)
    {
        $parsed = collect(json_decode($update->new_data, true));
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
                'category' => fn($v) => [
                    'Kategori' => $v === 'class' ? 'Kelas' : 'Bukan Kelas'
                ],
            ],
        ];

        $map = $labelMaps[$update->table] ?? [];
        $update->parsed_new_data = $parsed
            ->mapWithKeys(function ($value, $key) use ($map) {
                if (!isset($map[$key]))
                    return [];

                $label = $map[$key];
                return is_callable($label)
                    ? $label($value)
                    : [$label => $value];
            })
            ->toArray();
        // dd($update->parsed_new_data);
        return $update;
    }
}