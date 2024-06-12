<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantOption extends Model
{
    use HasFactory;

    protected $table = 'variant_option';
    protected $fillable = ['variant_id', 'name'];

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function subVariants()
    {
        return $this->hasMany(SubVariant::class);
    }
}
