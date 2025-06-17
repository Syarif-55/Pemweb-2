<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\Forge; // Pastikan Forge di-use

class AddUmurAndKelaminToPenulis extends Migration
{
    public function up()
    {
        // Menambahkan kolom 'umur' (usia)
        $fields = [
            'umur' => [
                'type'       => 'INT',
                'constraint' => 3, // Misal, usia maksimal 999 tahun
                'unsigned'   => true, // Usia selalu positif
                'null'       => true, // Opsional: jika boleh kosong
                'after'      => 'address', // Opsional: letakkan setelah kolom 'address'
            ],
            // Menambahkan kolom 'kelamin' (jenis kelamin)
            'kelamin' => [
                'type'       => 'ENUM', // Menggunakan ENUM untuk pilihan terbatas
                'constraint' => ['Laki-laki', 'Perempuan'], // Pilihan nilai yang diizinkan
                'null'       => true, // Opsional: jika boleh kosong
                'after'      => 'umur', // Opsional: letakkan setelah kolom 'umur'
            ],
        ];
        $this->forge->addColumn('penulis', $fields);
    }

    public function down()
    {
        // Menghapus kolom jika migrasi di-rollback
        $this->forge->dropColumn('penulis', ['umur', 'kelamin']);
    }
}