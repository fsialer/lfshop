<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     protected $table="addresses";
    protected $fillable=['city_id','movil','telephone','type','address','lot','departament','urbanization','reference'];
    public function city(){
            return $this->belongsTo('App\City');
        }
    public function orders(){
        return $this->hasMany('App\Order');
    }
}
