<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantImage extends Model
{   
    protected $table = 'product_variant_images';
    protected $fillable = [
        'id','product_variant_id', 'image_path',
    ];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
