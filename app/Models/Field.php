<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = "fields";

    protected $fillable = [
        "name",
        "type",
        "options"
    ];

    protected $casts = [
        'options' => 'array',  // Converte o campo options para um array
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function field_values(){
        return $this->hasMany(FieldValues::class);
    }
}
