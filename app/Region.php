<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table="regions";
    protected $fillable=['name','visible'];
    public function municipalities(){
            return $this->hasMany('App\Municipality');
        }
    public static function filterAndPaginate($request){
        return Region::name($request->name)->orderBy('id','desc')->paginate();
    }
public function scopeName($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
}