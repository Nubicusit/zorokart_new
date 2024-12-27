<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_detail_id',
        'value',
        
    ];

    public function product_detail()
    {
        return $this->hasOne(Productdetails::class,'id','product_detail_id');
    }
}
