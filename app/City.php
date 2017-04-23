<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table="cities";
    protected $fillable=['municipality_id','name','visible'];
    public function municipality(){
            return $this->belongsTo('App\Municipality');
        }
    public function addresses(){
            return $this->hasMany('App\Address');
        }
     public static function filterAndPaginate($request){
        return City::with('municipality.region')->municipality($request->municipality_id)->name($request->name)->orderBy('id','desc')->paginate();
    }
    public function scopeName($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
     public function scopeMunicipality($query,$municipality){
         if($municipality>0){
            return $query->where('municipality_id',$municipality);
        }
    }
}
