<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsModel extends Model 
{

        use HasFactory;
       
        
         protected $table = 'blogs';
         
        protected $fillable = [
            'image',
            'heading',
            'author',
            'date',
            'content',
            'status',
            'key_description',
            'created_on',
            'updated_on',
          
            
        ];

      
    }
     