<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{   
    protected $table = 'product_variant';
    protected $fillable = [
        'product_id', 'quantity', 'price',
    ];

    // Define the relationships

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function subVariants()
    {
        return $this->hasMany(SubVariant::class);
    }
}
