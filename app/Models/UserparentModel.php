<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 
class UserparentModel extends Authenticatable
{


        use HasFactory;
        
        
         protected $table = 'user_parents';
         protected $primaryKey= 'id';

         protected $casts = [
            'role'=>'object',
        ];
         
        protected $guarded = [];
    }