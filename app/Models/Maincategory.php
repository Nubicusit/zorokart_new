<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Maincategory extends Model implements HasMedia
{

        use HasFactory;
        use InteractsWithMedia;
        
         protected $table = 'main_category';
         
        protected $fillable = [
            'name',
            'image',
            'status',
            'caption',
            'order_by'
            
        ];
    }
