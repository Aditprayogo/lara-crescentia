<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'title', 'slug', 'location', 'about', 'featured_event',
		'language', 'foods', 'departure_date', 'duration', 'type',
		'price'
	];

	protected $hidden = [];

	public function galleries()
	{
		# code...
		return $this->hasMany('App\Gallery', 'travel_packages_id', 'id');
	}

	


}
