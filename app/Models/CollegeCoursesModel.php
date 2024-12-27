<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeCoursesModel extends Model 
{

        use HasFactory;
       
        
         protected $table = 'college_courses';
         
        protected $fillable = [
            'course_id',
            'stream_id',
            'ins_id',
            'course_fee',
            'course_duration',
            'created_at',
            'updated_at',
            
          
            
        ];

      
    }
    