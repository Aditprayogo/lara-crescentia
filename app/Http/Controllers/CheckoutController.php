<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PackageTravel;
use App\Trasaction;
use App\TrasactionDetail;

use Carbon\Carbon;


class CheckoutController extends Controller
{
    public function index($id)
	{
		# code...
		$item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

		return view('pages.checkout-travel', [
			'item' => $item
		]);
	}

	public function success($id)
	{
		# code...
		$transaction = Transaction::findOrFail($id);
		$transaction->transaction_status = 'PENDING';

		$transaction->save();
		
		return view('pages.success');
		
	}

	public function process($id)
	{
		# code...
		$travel_package = TravelPackage::findOrFail($id);

		$transaction = Transaction::create([
			'travel_packages_id' => $travel_package->id,
			'users_id' => Auth::user()->id,
			'additional_visa' => 0,
			'transaction_total' => $travel_package->price,
			'transaction_status' => 'IN_CART',
		]);

		TrasactionDetail::create([
			'transaction_id' => $transaction->id,
			'username' => Auth::user()->username,
			'nationality' => 'ID',
			'is_visa' => false,
			'doe_passport' => Carbon::now()->addYears(5),
		]);

		return view('pages.success')->route('checkout.index', $transaction->id)->with('success', 'Date has been created');
	}

	public function create(Request $request, $id)
	{
		# code...
		$request->validate([
			'username' => 'required|string|exists:users,username',
			'is_visa' => 'required|boolean',
			'doe_passport' => 'required'
		]);

		$data = $request->all();
		$data['transactions_id'] = $id;

		TransactionDetail::create($data); 

		$transaction = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

		if ($request->is_visa) {
			# code...
			$transaction->transaction_total += 190;
			$transaction->additional_visa += 190;
		}

		$transaction->transaction_total += $transaction->travel_package->price;

		$transaction->save();

		return redirect()->route('checkout.index', $transaction->id)->with('success', 'Data has been created');

	}

	public function remove(Request $request,$detail_id)
	{
		# code...
		$item = TrasactionDetail::findOrFail($detail_id);

		$transaction = Transaction::with(['details', 'travel_package'])->findOrFail($item->transaction_id);

		if ($item->is_visa) {
			# code...
			$transaction->transaction_total -= 190;
			$transaction->additional_visa -= 190;
		}

		$transaction->transaction_total -= $transaction->travel_package->price;

		$transaction->save();

		$item->delete();

		return redirect()->route('checkout.index', $item->transaction_id)->with('success', 'Data has been deleted');


	}
}
