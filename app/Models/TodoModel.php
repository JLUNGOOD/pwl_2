<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoModel extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $fillable=[
        'user_id',
        'todo',
        'label',
        'done',
    ];

    protected $hidden=[
        'user_id',
    ];

    protected $casts=[
        'done' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
