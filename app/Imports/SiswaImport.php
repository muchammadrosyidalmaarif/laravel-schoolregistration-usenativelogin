<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Siswa;


class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key =>$row)
        {
            if($key>=2){
                Siswa::create([
                    'nama_depan' => $row[0],
                    'nama_belakang' => $row[1],
                    'jenis_kelamin' => $row[2],
                    'agama'         => $row[3],
                    'alamat'        => $row[4]
                ]);
            }
          
        }
       
    }
}
