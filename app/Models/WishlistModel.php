<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WishlistModel extends Model
{

        use HasFactory;
       
        
         protected $table = 'wish_list';
         
        protected $fillable = [
            'ins_id',
            'college_id',
            'user_id',
            'created_at',
            'updated_at',
            
        ];
    }
