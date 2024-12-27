<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellorModel extends Model 
{

        use HasFactory;
       
        
         protected $table = 'counsellor';
         
        protected $fillable = [
            'name',
            'phone',
            'ins_id',
            'callback',
            'message',
            'created_at',
            'updated_at',
          
            
        ];

      
    }
    