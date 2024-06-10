<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{   
    protected $table = 'sub_category';
    protected $fillable = ['name'];
    
    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_sub_category', 'sub_category_id', 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
