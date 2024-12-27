<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferalsModel extends Model 
{

        use HasFactory;
       
        
         protected $table = 'referals';
         
        protected $fillable = [
            'name',
            'phone',
            'refer_name',
            'email',
            'refer_phone',
            'about',
            'created_at',
            'updated_at',
          
            
        ];

      
    }
     