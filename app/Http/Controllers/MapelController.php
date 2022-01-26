<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Guru;

class MapelController extends Controller
{
    public function index(Guru $guru)
    {
        $mapel = Mapel::all();
        return view('mapel.mapel',[
            'mapel' => $mapel,
            'guru' => $guru
        ]);
        
    }
}
