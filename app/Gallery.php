<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
		'travel_packages_id',
		'image'
	];

	public function travel_package()
	{
		# code...
		return $this->belongsTo('App\TravelPackage', 'travel_packages_id', 'id');
	}
}
