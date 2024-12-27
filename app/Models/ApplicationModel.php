<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ApplicationModel extends Model
{

        use HasFactory;
       
        
         protected $table = 'application';
         
        protected $fillable = [
            'id',
            'photo',
            'status',
            'mode_of_pay',
            'name',
            'email',
            'dob',
            'gender',
            's_class',
            'religion',
            'cast',

            'category',
            'f_name',
            'f_phone',
            'f_qualification',
            'f_occupation',
            'f_income',
            'm_name',
            'm_phone',
            'm_qualification',

            'm_occupation',
            'm_income',
            'adhaar',
            'disability',
            's_condition',
            'address',
            'district',
            'state',
            'pincode',

            'permanent_add',
            'cor_address',
            'cor_district',
            'cor_state',
            'cor_pincode',
            'application_no'
           
            
        ];
    }
