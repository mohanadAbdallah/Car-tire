<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    use HasFactory;
    protected $fillable=['car_id','shelf_id','type','customer_id','manufacture_company','manufacture_year','rim_type','size','notes','malfunction_degree'];


    protected $appends = ['typee'];

    protected $casts=[
        'size'=>'array'
    ];

    public function getTypeeAttribute()
    {

        if ($this->type ==1)
            return @trans('app.summery');
        elseif ($this->type ==2)
            return  @trans('app.winter');

        else null;

    }
    public function car(){
       return $this->belongsTo(Car::class);
    }
    public function shelf(){
        return $this->belongsTo(shelf::class);
    }

}
