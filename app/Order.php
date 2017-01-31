<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table="orders";
    protected $fillable=['subtotal','shipping','user_id'];
    
    public function user(){
    	return $this->belongsTo('App\User');
    }
    
    public function products(){        
        return $this->belongsToMany('App\Product')->withPivot('quantity', 'price');
    }
    public function scopeSearch($query,$date_order){
         if(trim($date_order)!=""){
            return $query->where('created_at','LIKE',"%$date_order%");
        }
    }
}