<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Productdetails extends Model
{

        use HasFactory;
       
        
         protected $table = 'product_details';
         
        protected $fillable = [
            'name',
            'status',
            'order_by',
            'created_at',
            'updated_at',
            
        ];
    }
