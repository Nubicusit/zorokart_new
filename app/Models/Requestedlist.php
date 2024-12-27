<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;



class Requestedlist extends Model 
{
    use HasFactory;
  
      protected $table = 'requested_lists';
 protected $fillable = [

        'property_id',

        'user_email',

    ];

    
    public function guardName(){
        return "web";
    }
    
    public function getRoleAttribute()
    {
        return $this->roles->first()->name;
    }

    public function getRoleLabelAttribute()
    {
        return ucwords(str_replace('-', ' ', $this->role));
    }


    public function isActive()
    {
        return $this->status == 1;
    }


}
