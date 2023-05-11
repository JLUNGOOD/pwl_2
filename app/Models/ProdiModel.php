<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdiModel extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $fillable = [ 'prodi' ];

    public function mahasiswa(){
        return $this->hasMany(MahasiswaModel::class, 'id_prodi', 'id_prodi');

    }
}
