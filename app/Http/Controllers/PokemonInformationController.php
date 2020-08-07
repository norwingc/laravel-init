<?php

namespace App\Http\Controllers;

use App\Models\PokemonInformation;
use Illuminate\Http\Request;

class PokemonInformationController extends Controller
{
	/**
	 * Undocumented function
	 * @param PokemonInformation $PokemonInformation
	 * @return void
	 */
    public function get(PokemonInformation $PokemonInformation)
	{
		return response()->json([
			'pokemon_information' => $PokemonInformation
		]);
	}

	public function store(Request $request, PokemonInformation $pokemon_information = null)
	{

	}
}
