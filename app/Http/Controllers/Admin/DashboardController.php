<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TravelPackage;
use App\Transaction;

class DashboardController extends Controller
{
	//
	public function index()
	{
		# code...
		$paketTravel = TravelPackage::count();
		$transaksi = Transaction::count();
		$pending = Transaction::where('transaction_status', 'PENDING')->count();
		$sukses = Transaction::where('transaction_status', 'SUCCESS')->count();


		return view('pages.admin.dashboard',[
			'paketTravel' => $paketTravel,
			'transaksi' => $transaksi,
			'pending' => $pending,
			'sukses' => $sukses
		]);
	}
}
