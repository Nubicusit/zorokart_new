<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsreplyModel extends Model 
{

        use HasFactory;
       
        
         protected $table = 'blogs_reply';
         
        protected $fillable = [
            'name',
            'mail',
            'website',
            'message',
            'created_at',
            'updated_at',
          
            
        ];

      
    }
     