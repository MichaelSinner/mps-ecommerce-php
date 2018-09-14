<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function paypalItem(){

    	return \PaypalPayment::item()->setName($product->title)->setDescription($product->description)->setCurrency('USD')->setQuantity(1)->setPrice($this->pricing);
    }
}
