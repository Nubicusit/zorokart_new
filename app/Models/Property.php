<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    
     protected $table = 'properties';
     
    protected $fillable = [
        'name',
        'image',
        'location',
        'price',
        'category',
        'vol',
        'size',
        'type',
        'class',
        'zoning',
        'map',
        'state','featured','description',
    ];
}
