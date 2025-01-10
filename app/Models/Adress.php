<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adress extends Model
{
    use SoftDeletes;
    protected $table= "adress";
    protected $fillable = [
        "user_id",
        "pais",
        "estado",
        "cidade"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function phone(){
        return $this->hasMany(Phone::class);
    }
}
