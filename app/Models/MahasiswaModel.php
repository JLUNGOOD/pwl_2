<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim',
        'nama',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp',
        'id_prodi',
        'foto'
    ];

    public function prodi(){
        return $this->belongsTo(ProdiModel::class, 'id_prodi', 'id_prodi');
    }

    public function MahasiswaMatakuliahModel(){
        return $this->hasMany(MahasiswaMatakuliahModel::class);
    }
}

