<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PokemonInformation extends Model
{
	use SoftDeletes;

	public function comments()
	{
		return $this->hasMany(PokemonComment::class);
	}
}
