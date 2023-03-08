<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matkulModel extends Model
{
    use HasFactory;

    protected $table = 'matkul';
    protected $primaryKey = 'kode_matkul';
    protected $keyType =  'string';
}
