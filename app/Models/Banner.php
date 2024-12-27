<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['banner_image','banner_caption','main_category_id','banner_order','status'];

    public function main_category()
    {
        return $this->hasOne(Maincategory::class,'id','main_category_id');
    }
}
