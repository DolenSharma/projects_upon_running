<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChessGameController;

Route::resource('chess', ChessGameController::class)->names([
    'index' => 'chess.index',
]);





