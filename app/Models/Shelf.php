<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;
    protected $fillable = ['name','status','shelf_number','capacity'];
    protected $appends = ['status_name'];

    public function getStatusNameAttribute()
    {
        if ($this->status ==0)
            return @trans('app.full_of');
        elseif ($this->status ==1)
            return @trans('app.available');
        elseif ($this->status ==2)
            return  @trans('app.under_maintenance');

        else null;


    }
    public function tires(){
        return $this->hasMany(Tire::class);
    }

}
