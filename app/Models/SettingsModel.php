<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SettingsModel extends Model
{

        use HasFactory;
       
        
         protected $table = 'settings';
         
        protected $fillable = [
            'id',
            'phone',
            'email',
            'address',
            'created_at',
            'updated_at',
            
        ];
    }
