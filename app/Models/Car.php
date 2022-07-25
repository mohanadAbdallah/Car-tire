<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','car_number','type','vehicle_type','model','color','tire_size','fuel_type'];
//    protected $appends=['name'];

//    public function getNameAttribute()
//    {
//        if (app()->getLocale() == 'en')
//            return $this->name_en;
//        else
//            return $this->name_ar;
//    }
    public function customer(){
        return $this->belongsTo(customer::class);
    }
    public function tires(){
        return $this->hasMany(Tire::class);
    }



}
