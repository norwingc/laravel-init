<?php

namespace App\Http\Controllers;

use App\Models\PokemonComment;
use App\Models\PokemonInformation;
use Illuminate\Http\Request;

class PokemonCommentController extends Controller
{
    public function get(PokemonInformation $PokemonInformation)
	{
		return response()->json([
			'comments' => $PokemonInformation->load('comments')
		]);
	}

	/**
	 * Undocumented function
	 * @param Request $request
	 * @param PokemonInformation $pokemonInformation
	 * @return void
	 */
	public function store(Request $request, PokemonInformation $PokemonInformation)
	{
		$comment = new PokemonComment($request->all());
		$PokemonInformation->comments()->save($comment);

		return response()->json([
			'saved' => true,
			'comment' => $comment
		]);
	}
}
