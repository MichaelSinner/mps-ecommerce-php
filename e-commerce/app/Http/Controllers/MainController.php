<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;


/**
 * MainController of main view
 */
class MainController extends Controller
{
	public function home(){
	

		return view('main.home');
	}
}


