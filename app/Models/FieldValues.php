<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldValues extends Model
{
    protected $fillable = ['field_id', 'item_id', 'value'];
    protected $table = 'field_values';

    public function field()
    {
        return $this->belongsTo(Field::class);  // Relaciona o valor ao campo específico
    }}
