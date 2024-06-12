<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubVariant extends Model
{
    use HasFactory;

    protected $table = 'sub_variant';

    protected $fillable = ['product_variant_id', 'variant_option_id'];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function variantOption()
    {
        return $this->belongsTo(VariantOption::class);
    }

    
}
