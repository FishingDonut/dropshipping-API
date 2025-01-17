<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'fullName',
        'email',
        'password',
        'phone',
    ];
}
