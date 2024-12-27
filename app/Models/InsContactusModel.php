<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsContactusModel extends Model 
{

        use HasFactory;
       
        
         protected $table = 'ins_contactus';
         
        protected $fillable = [
            'institute',
            'name',
            'contact',
            'email',
            'message',
            'role',
            'created_at',
            'updated_at',
          
            
        ];

      
    }
     