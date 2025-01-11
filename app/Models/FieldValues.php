<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldValues extends Model
{
    use HasFactory;
    protected $fillable = ['field_id', 'product_id', 'value'];
    protected $table = 'field_values';

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
