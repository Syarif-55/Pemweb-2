<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PenulisSeeder extends Seeder
{
    public function run()
    {
        // $data = [ // Dijadikan komen
        //     [
        //         'name'       => 'Tomy Syafrudin',
        //         'address'    => 'Jl Gus Dur no 150 Jombang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'name'       => 'Agus Setiawan',
        //         'address'    => 'Jl Merdeka no 150 Jombang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'name'       => 'Kang Dedi',
        //         'address'    => 'Jl Pattimura no 150 Jombang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ]
        // ];

        $faker = \Faker\Factory::create('id_ID'); // Membuat instance Faker dengan lokal Indonesia
        $jenisKelamin = ['Laki-laki', 'Perempuan'];
        for ($i = 0; $i < 100; $i++) { // Loop 100 kali
            $data = [
                'name'       => $faker->name, // Mengambil nama acak dari Faker
                'address'    => $faker->address, // Mengambil alamat acak dari Faker
                'umur'       => $faker->numberBetween(7, 70),
                'kelamin' => $faker->randomElement($jenisKelamin),
                'created_at' => Time::createFromTimestamp($faker->unixTime()), // Mengambil timestamp acak untuk created_at
                'updated_at' => Time::now(), // Menggunakan waktu saat ini untuk updated_at
            ];

            $this->db->table('penulis')->insert($data); // Memasukkan data ke tabel 'penulis'
        }
    }
}