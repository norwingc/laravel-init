<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PokemonComment extends Model
{
	use SoftDeletes;

    protected $fillable = [
		'body'
	];

	public function pokemon_information()
	{
		return $this->belongsTo(PokemonInformation::class);
	}
}
