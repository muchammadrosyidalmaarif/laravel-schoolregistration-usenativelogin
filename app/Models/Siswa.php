<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable=['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id'];


    public function getAvatar()
    {
        if($this->avatar)
        {
            return asset('images/'.$this->avatar);
        }
        return asset('images/default.jpg');
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }
    use HasFactory;

    public function nama_lengkap()
    {
        return $this->nama_depan." ".$this->nama_belakang;
    }
}
