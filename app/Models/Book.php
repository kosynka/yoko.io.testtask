<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'author',
        'description',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
