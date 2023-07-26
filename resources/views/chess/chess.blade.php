@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chess Game</h1>
        <div id="chessboard"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/chess.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var board = null;
            var game = new Chess();

            function onDragStart(source, piece, position, orientation) {
                // Prevent dragging if it's not the player's turn or the game is over
                if (game.game_over() === true ||
                    (game.turn() === 'w' && piece.search(/^b/) !== -1) ||
                    (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
                    return false;
                }
            }

            function onDrop(source, target) {
                var move = game.move({
                    from: source,
                    to: target,
                    promotion: 'q' // Promote pawns to queens by default
                });

                // If the move is illegal, snapback the piece
                if (move === null) {
                    return 'snapback';
                }
            }

            function onSnapEnd() {
                board.position(game.fen());
            }

            function onGameOver() {
                alert('Game over!');
            }

            var config = {
                draggable: true,
                position: 'start',
                onDragStart: onDragStart,
                onDrop: onDrop,
                onSnapEnd: onSnapEnd,
                onGameOver: onGameOver
            };

            board = Chessboard('chessboard', config);
        });
    </script>
@endsection
