<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
     protected $table="municipalities";
    protected $fillable=['region_id','name','visible'];
    public function region(){
            return $this->belongsTo('App\Region');
        }
    public function cities(){
            return $this->hasMany('App\City');
        }
     public static function filterAndPaginate($request){
        return Municipality::with('region')->region($request->region_id)->name($request->name)->orderBy('id','desc')->paginate();
    }
    public function scopeName($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
     public function scopeRegion($query,$region){
         if($region>0){
            return $query->where('region_id',$region);
        }
    }
    
}