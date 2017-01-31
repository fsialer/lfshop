<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
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
    protected $table="categories";

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
