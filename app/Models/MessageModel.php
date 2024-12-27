<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MessageModel extends Model
{

        use HasFactory;
       
        
         protected $table = 'message';
         
        protected $fillable = [
            'id',
            'type',
            'institute',
            'name',
            'phone',
            'email',
            'message',
            'created_at',
            'updated_at',
            
        ];
    }
