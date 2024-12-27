<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsMessageModel extends Model 
{

        use HasFactory;
       
        
         protected $table = 'ins_msg';
         
        protected $fillable = [
            'message',
            'ins_id',
            'user_id',
            'created_at',
            'updated_at',
            
          
            
        ];

      
    }
    