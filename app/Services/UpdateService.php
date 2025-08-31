<?php

namespace App\Services;

use App\Models\Campus;
use App\Models\Building;

class UpdateService
{
    public static function transform($update)
    {

        $parsed_new = collect(json_decode($update->new_data, true));
        $parsed_old = collect(json_decode($update->old_data, true)) ?? [];

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