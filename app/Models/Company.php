<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Company extends Model
{
    use HasFactory;
    protected $fillable=['name','person_name','email','phone','website','address'];

    public function companyLinks(){
        return $this->hasMany(CompanyLink::class);
    }

}
