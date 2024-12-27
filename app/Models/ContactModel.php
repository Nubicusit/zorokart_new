<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model 
{

        use HasFactory;
       
        
         protected $table = 'contactus';
         
        protected $fillable = [
            'name',
            'about',
            'phone',
            'reason',
            'email',
            'message',
            'location',
            'created_on',
            'updated_on',
          
            
        ];

      
    }
    