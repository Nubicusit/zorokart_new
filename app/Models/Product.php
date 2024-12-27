<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_category_id',
        'category_id',
        'sub_category_id',
        'image',
        'status',
        
    ];

    public function main_category()
    {
        return $this->hasOne(Maincategory::class,'id','main_category_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function sub_category()
    {
        return $this->hasOne(Subcategory::class,'id','sub_category_id');
    }
}
