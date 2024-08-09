<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nik',
        'ttl',
        'no_telp',
        'email',
        'educational',
        'role',
        'expertise',
        'image',
    ];
}
