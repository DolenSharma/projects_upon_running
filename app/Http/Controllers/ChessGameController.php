<?php

namespace App\Http\Controllers;

use App\Models\ChessGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ChessGameController extends Controller
{
    public function index()
    {
        $games = ChessGame::all();

        return view('chess.index', compact('games'));
    }

    public function create()
    {
        return view('chess.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'player1' => 'required',
            'player2' => 'required',
            'moves' => 'required',
        ]);

        ChessGame::create($request->all());

        return redirect()->route('chess.index')->with('success', 'Chess game created successfully.');


    }

    public function edit(ChessGame $game)
    {
        return view('chess.edit', compact('game'));
    }

    public function update(Request $request, ChessGame $game)
    {
        $request->validate([
            'player1' => 'required',
            'player2' => 'required',
            'moves' => 'required',
        ]);

        $game->update($request->all());

        return redirect()->route('chess.index')->with('success', 'Chess game updated successfully.');
    }

    public function destroy(ChessGame $game)
    {
        $game->delete();

        return redirect()->route('chess.index')->with('success', 'Chess game deleted successfully.');
    }
}
