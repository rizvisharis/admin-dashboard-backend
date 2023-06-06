<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'full_name',
        'gender',
        'profile_photo_path',
    ];
}
