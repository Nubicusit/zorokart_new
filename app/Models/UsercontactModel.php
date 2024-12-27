<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UsercontactModel extends Model 
{

        use HasFactory;
        
        
         protected $table = 'user_contact';
         
        protected $fillable = [
            'institute',
            'name',
            'phone',
            'email',
            'message',
            'created_at',
            'updated_at'
           
            
        ];
    }
