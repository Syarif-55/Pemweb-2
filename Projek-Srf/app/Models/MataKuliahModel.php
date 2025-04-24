<?php

namespace App\Models;

class MataKuliahModel
{
    private $data = [
        [
            'kode' => '1',
            'nama' => 'Manajemen Basis data',
            'sks' => 4,
            'dosen' => 'Chandra Sukma A'
        ],
        [
            'kode' => '2',
            'nama' => 'Pemrograman Web',
            'sks' => 4,
            'dosen' => 'M Miftahul Syaikh'
        ],
        [
            'kode' => '3',
            'nama' => 'Manajemen Jaringan Komputer',
            'sks' => 4,
            'dosen' => 'Moh Ali'
        ],
        [
            'kode' => '4',
            'nama' => 'Rekayasa Perangkat Lunak',
            'sks' => 4,
            'dosen' => 'M masrur'
        ]
    ];

    public function findAll()
    {
        return $this->data;
    }

    public function find($kode)
    {
        foreach ($this->data as $item) {
            if ($item['kode'] === $kode) {
                return $item;
            }
        }
        return null;
    }
}
