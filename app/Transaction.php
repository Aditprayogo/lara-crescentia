<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{

	use SoftDeletes;

    protected $fillable = [
		'travel_packages_id',
		'users_id',
		'additional_visa',
		'transaction_total',
		'transaction_status',
	];

	protected $hidden = [];

	public function details()
	{
		# code...
		return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
	}

	public function travel_package()
	{
		# code...
		return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
	}

	public function user()
	{
		# code...
		return $this->belongsTo(User::class, 'users_id', 'id');
	}
}
