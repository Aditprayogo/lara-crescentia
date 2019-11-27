<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
	{
		# code...
		return view('pages.detail');
	}
}
