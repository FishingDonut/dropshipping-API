<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = ['badge'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
