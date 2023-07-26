@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Chess Game</h1>
        <form action="{{ route('chess.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="player1" class="form-label">Player 1</label>
                <input type="text" name="player1" id="player1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="player2" class="form-label">Player 2</label>
                <input type="text" name="player2" id="player2" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="moves" class="form-label">Moves</label>
                <textarea name="moves" id="moves" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
