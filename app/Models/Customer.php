<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=['name_ar','name_en','mobile','address','email'];
    protected $appends=['name'];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'en')
            return $this->name_en;
        else
            return $this->name_ar;
    }
    public function car(){
        return $this->hasMany(Car::class);
    }

}
