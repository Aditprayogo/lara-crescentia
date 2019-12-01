<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{

	use SoftDeletes;

    protected $fillable = [
		'transactions_id',
		'username',
		'nationallity',
		'is_visa',
		'doe_passport'
	];

	protected $hidden = [];

	public function transaction()
	{
		# code...
		return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
	}
}
