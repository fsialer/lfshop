<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
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
    protected $fillable=['category_id','mark_id','name','description','extract','price','visible'];
    
    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function mark(){
    	return $this->belongsTo('App\Mark');
    }
    public function images(){
    	return $this->hasMany('App\Image');
    }
    public function orders(){        
        return $this->belongsToMany('App\Order')->withPivot('quantity', 'price');
    }
    public function scopeSearch($query,$name){
         if(trim($name)!=""){
            return $query->where('name','LIKE',"%$name%");
        }
    }
}