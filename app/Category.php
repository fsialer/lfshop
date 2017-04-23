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

    protected $fillable=['name','slug','description'];
    
    public static function filterAndPaginate($request){
        return Category::name($request->name)->orderBy('id','desc')->paginate();
    }
    
    public function subcategories(){
    	return $this->hasMany('App\SubCategory');
    }
    

    
    public function scopeName($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
    
    public function scopeSearchCategory($query,$slug){
        return $query->where('slug',$slug);
    }
}
