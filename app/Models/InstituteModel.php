<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteModel extends Model
{

        use HasFactory;


         protected $table = 'institute';

         protected $casts = [
            'gallery'=>'object',
            'videos'=>'object',
            'facilities'=>'object',
            'student_description'=>'object',
            'class'=>'object',
            'student_name'=>'object',
            'awards'=>'object',
           
        ];

        protected $fillable = [
            'id',
            'seat_remain',
            'view',
            'discount',
            'valid_date',
            'principle_name',
            'state',
            'city',
            'action',
            'message',
            'name',
            'address',
            'ownership',
            'board',
            'cost',
            'max_cost',
            'establishment',
            'd_status',
            'acres',
            'm_fees',
            'c_type',
            'c_offered',
            'start_date',
            'end_date',
            'eligibility',
            'marks',
            'seats',
            'hostel_num',
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
            'other_fees',
            
            'gallery',
            'videos',
            'u_phone',
            'u_location',
            'enable',
            'user_id',
            'type',
            'facilities'
        ];

        }


