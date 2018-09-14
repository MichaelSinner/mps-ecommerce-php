<?php 

namespace App;

/**
 * 
 */
class Paypal 
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = 'ATKF3NyssgfxnKZGRl1NXMRptjWOsSTT0iXPDRzWtexPFE6_4JOfk7ryqLdPQYlAle0u_nLNE-Nl8EFl';
	private $_ClientSecret = 'EN8fRKkqZWthY3PcT5gPtTqwR-moSjYb1DKnCff0wGoIJzmaxlVa_tdt3VWyzow1px7JtSbYtvOQ_i7P';

	public function __construct($shopping_cart){
		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);
		$config = config("paypal_payment");
		$flatConfig = array_dot($config);
		$this->_apiContext->setConfig($flatConfig);
		$this->shopping_cart = $shopping_cart;
	}

	public function generate(){
		$payment = \PaypalPayment::payment()->setIntent("sale")->setPayer([$this->transaction()])->setRedirectsUrls($this->redirectURLs());
	}

	public function payer(){
		//Returns payment's info
		return \PaypalPayment::payer()->setMethod("paypal");
	}

	public function transaction(){
		//Returns transaction's info
		return \PaypalPayment::transaction()
										->setAmount($this->amount())
										->setItemList($this->items())
										->setDesciption("Tu compra en PanchitoStore")
										->setInvoiceNumber(uniqid());
	}

	public function items(){
		$items = [];
		$products = $this->shopping_cart->products()->get();
		foreach ($products as $product) {
			array_push($items, $product->paypalItem());
		}

		return \PaypalPayment::itemList()->setItems($items);
	}

	public function amount(){
		return \PaypalPayment::amount()->serCurrency("USD")->setTotal($this->shopping_cart->total());
	}

	public function setRedirectsUrls(){
		$baseURL = url('url');
		return \PaypalPayment::redirectURLs()->setReturnUrl("$baseURL/payments/store")->setCancelUrl("$baseURL/carrito");
	}

	
}




?>