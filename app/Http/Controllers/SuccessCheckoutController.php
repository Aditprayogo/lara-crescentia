<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessCheckoutController extends Controller
{
    public function index()
	{
		# code...
		return view('pages.success');
	}
}
