<?php

namespace Database\Seeders;
use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mapel::create([
            'kode' => 'MPL01',
            'nama' => 'Bahasa Mandarin',
            'semester' => 'Ganjil',
            'guru_id' => '1',

        ]);
    }
}
