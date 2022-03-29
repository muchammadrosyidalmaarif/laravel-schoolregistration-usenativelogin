<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([

            'nama_guru' => 'Nasir',
            'telepon' => '90947756445',
            'alamat' => 'Semarang'
        ]);
       
    }
}
