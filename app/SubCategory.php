<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class SubCategory extends Model
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
    protected $table="subcategories";

    protected $fillable=['category_id','name','slug','image','description'];
    
    public static function filterAndPaginate($request){
        return SubCategory::with('category')->category($request->category)->name($request->name)->orderBy('id','desc')->paginate();
    }
     public function products(){
    	return $this->hasMany('App\Product','subcategory_id');
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
     public function scopeName($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
    public function scopeCategory($query,$category){
         if($category>0){
            return $query->where('category_id',$category);
        }
    }
    public function scopeSearchSubCategory($query,$slug){
        if(trim($slug)!=""){
            return $query->where('slug',$slug);
        }
        
       
    }
}
