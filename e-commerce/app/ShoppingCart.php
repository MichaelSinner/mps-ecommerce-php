<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
	protected $fillable = ["status"];

	public function productsSize(){
		return $this->id; 
	}

    public static function findOrCreatedbySessionID($shopping_cart_id){
    	if($shopping_cart_id)
			return ShoppingCart::findBySession($shopping_cart_id);
		else
			return ShoppingCart::creatWithoutSession();

    }

	public static function findBySession($shopping_cart_id){
		return ShoppingCart::find($shopping_cart_id);
	}

	public static function creatWithoutSession(){
		return ShoppingCart::create([
			"status" => "incompleted"
		]);
		
	}
}
