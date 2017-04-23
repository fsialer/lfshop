<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Mark extends Model
{
    use Sluggable;
    public function sluggable(){
        return [
            'slug'=>[
            'source'=>'name',
            'unique'=>true,
            'onUpdate'=>true
            ]
        ];
    }
    protected $table="marks";

    protected $fillable=['name','slug','description'];
     public function products(){
    	return $this->hasMany('App\Product');
    }
    
    public static function filterAndPaginate($request){
        return Mark::name($request->name)->orderBy('id','desc')->paginate();
    }
     public function scopeName($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
}
