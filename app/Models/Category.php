<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name'];

    public function subCategory()
    {
        return $this->belongsToMany(SubCategory::class, 'category_sub_category', 'category_id', 'sub_category_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    
}
