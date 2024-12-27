<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Subcategory extends Model
{

        use HasFactory;
       
        
        protected $table = 'Subcategory';
         
        protected $fillable = [
            'cat_id',
            'sub_name',
            'status',
            'created_at',
            'updated_at',
            
        ];
    }
