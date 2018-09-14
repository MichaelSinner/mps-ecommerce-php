<?php 

namespace App;

/**
 * 
 */
class Paypal 
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = "PAYPAL_CLIENT_ID";
	private $_ClientSecret = "PAYPAL_CLIENT_SECRET";

	public function __construct($shopping_cart){
		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);
		$config = config("paypal_payment");
		$flatConfig = array_dot($config);
		$this->_apiContext->setConfig($flatConfig);
		$this->shopping_cart = $shopping_cart;
	}

	
}




?>