<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{   
    protected $table = 'product_variant';
    protected $fillable = [
        'product_id', 'color_id', 'size_id', 'quantity', 'price',
    ];

    // Define the relationships

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function images()
    {
        return $this->hasMany(ProductVariantImage::class);
    }
}
