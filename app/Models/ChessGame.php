<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChessGame extends Model
{
    use HasFactory;

    protected $fillable = ['player1', 'player2', 'moves'];
}

