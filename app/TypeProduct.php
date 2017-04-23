<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class TypeProduct extends Model
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
    protected $table="type_products";

    protected $fillable=['name','slug','description'];
    
     public function products(){
    	return $this->hasMany('App\Product','typeproduct_id');
    }
    
    public static function filterAndPaginate($request){
        return TypeProduct::name($request->name)->orderBy('id','desc')->paginate();
    }
     public function scopeName($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }

    public function scopeSearchTypeProduct($query,$slug){
         if(trim($slug)!=""){
        return $query->where('slug',$slug);
         }
    }
}
