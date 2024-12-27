<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advancelead extends Model
{
    use HasFactory;
   
        
        
         protected $table = 'advancelead';
         protected $primaryKey= 'id';

        //  protected $casts = [
        //     'role'=>'object',
        // ];
         
        protected $guarded = [];
}
