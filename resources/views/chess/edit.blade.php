@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Chess Game</h1>
        <form action="{{ route('chess.update', $game) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="player1" class="form-label">Player 1</label>
                <input type="text" name="player1" id="player1" class="form-control" value="{{ $game->player1 }}" required>
            </div>
            <div class="mb-3">
                <label for="player2" class="form-label">Player 2</label>
                <input type="text" name="player2" id="player2" class="form-control" value="{{ $game->player2 }}" required>
            </div>
            <div class="mb-3">
                <label for="moves" class="form-label">Moves</label>
                <textarea name="moves" id="moves" class="form-control" required>{{ $game->moves }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
