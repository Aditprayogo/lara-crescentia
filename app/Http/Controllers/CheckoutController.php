<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
	{
		# code...
		return view('pages.checkout-travel');
	}

	public function success()
	{
		# code...
		return view('pages.success');
	}
}
