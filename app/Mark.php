<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table="marks";

    protected $fillable=['name','description'];
     public function products(){
    	return $this->hasMany('App\Product');
    }
     public function scopeSearch($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
}
