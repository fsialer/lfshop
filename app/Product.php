<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Product extends Model
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
    protected $table="products";
    protected $fillable=['subcategory_id','typeproduct_id','mark_id','name','description','extract','price','visible'];
    
    public static function filterAndPaginate($request){
        return 
            Product::with('subcategory.category','mark','typeproduct')->name($request->name)->orderBy('id','desc')
                ->paginate();
    }
    
    public function subcategory(){
    	return $this->belongsTo('App\SubCategory');
    }
    public function mark(){
    	return $this->belongsTo('App\Mark');
    }
    public function typeproduct(){
    	return $this->belongsTo('App\TypeProduct');
    }
    public function images(){
    	return $this->hasMany('App\Image');
    }
    public function orders(){        
        return $this->belongsToMany('App\Order')->withPivot('quantity', 'price');
    }
    public function scopeName($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
    
/*     public function scopeCategory($query,$category){
         if($category>0){
            return $query->where('category_id',$category);
        }
    }*/
   
}