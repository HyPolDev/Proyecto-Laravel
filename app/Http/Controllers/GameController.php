<?php

namespace App\Http\Controllers;

use App\Models\Game;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function getAllGames()
    {
        $games = Game::all();
        return response()->json($games);
    }

    public function createGame(Request $request)
    {
        $gameName = $request->input("gameName");
        $description = $request->input("description");
        $urlImg = $request->input("urlImg");

        $gameExists = Game::where('gameName', $gameName)->exists();

        if ($gameExists) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Game with this name already exists."
                ],
                401
            );
        } else {
            $newGame = Game::create([
                'gameName' => $gameName,
                'description' => $description,
                'urlImg' => $urlImg
            ]);

            return response()->json($newGame);
        }
    }

    public function deleteGame($id)
    {

        $game = Game::find($id);

        if (!$game) {
            return response()->json([
                "success" => false,
                "message" => "Game not found."
            ], 404);
        }

        $game->delete();

        return response()->json([
            "success" => true,
            "message" => "Game deleted successfully."
        ]);
    }
}
