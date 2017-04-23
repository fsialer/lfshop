<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table="orders";
    protected $fillable=['subtotal','shipping','user_id'];
    private $total;
    public function user(){
    	return $this->belongsTo('App\User');
    }
    
    public static function filterAndPaginate($request){
        
        return Order::search($request->date_start,$request->date_finish)->orderBy('id','desc')->paginate();
    }
    
    public function products(){        
        return $this->belongsToMany('App\Product')->withPivot('quantity', 'price');
    }
    public function scopeSearch($query,$date_start,$date_finish){
        //dd($date_finish);
        if($date_start<$date_finish){
            return $query->whereBetween('created_at',[$date_start,$date_finish]);
        }
    }
    
    public function getTotal(){
        return $this->total;
    }
    
    public function setTotal($total){
        $this->total=$total;
    }
}