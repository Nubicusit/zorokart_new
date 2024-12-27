<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeModel extends Model 
{
    
        use HasFactory;
       
        
         protected $table = 'college';

         protected $casts = [
            'gallery'=>'object',
            'videos'=>'object',
            'student_name'=>'object',
            'student_description'=>'object',
            'class'=>'object',
            'infrastructure'=>'object',
            'security'=>'object',
            'lab'=>'object',
            'activities'=>'object',
            's_activities' => 'object',

        ];
         
        protected $fillable = [
            'id',
            'd_status',
            'action',
            'message',
            'name',
            'address',
            'ownership',
            'board',
            'cost',
            'establishment',
            'd_status',
            'acres',
            'm_fees',
            'c_type',
            'c_offered',
            'a_session',
            'start_date',
            'end_date',
            'ratio',
            'school_type',
            'eligibility',
            'marks',
            'seats',
            'test',
            's_interaction',
            'p_interaction',
            'form_availibility',
            'form_payment',
            'school_time',
            'office_time',
            'awards',
            'student_name',
            'student_description',
            'exam_date',
            'class',
            'infrastructure',
            'security',
            'lab',
            'activities',
            's_activities',
            'gallery',
            'videos',
            'u_address',
            'u_phone',
            'u_location',
            'enable',
            
           
            
        ];
       
        }

    
