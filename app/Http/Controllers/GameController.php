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

    public function updateGame(Request $request, $id)
    {
        $game = Game::find($id);

        try {
            $gameId = $id;

            $newGameName = $request->input('gameName');
            $newDescription = $request->input('description');
            $newUrlImg = $request->input('urlImg');

            $game = Game::find($gameId);

            if ($newGameName) {
                $game->gameName = $newGameName;
            }
            if ($newDescription) {
                $game->description = $newDescription;
            }
            if ($newUrlImg) {
                $game->urlImg = $newUrlImg;
            }

            $existingGame = Game::where('gameName', $newGameName)->first();
            if ($existingGame && $existingGame->id !== $game->id) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "this game name is already in use"
                    ],
                    401
                );
            }

            $game->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Game name updated",
                    "data" => $game
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Error updating game name",
                    "error" => $th->getMessage()
                ],
                500
            );
        }
    }
}
