<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Store extends Model
{
	use Searchable;
	protected $fillable = [

	'pc_number',
	'analysis_region_name',
	'address',
	'city',
	'state',
	'zip',
	'phone',

	];
}
