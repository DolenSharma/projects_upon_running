<?php

use App\Http\Controllers\CountSubmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubmissionChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Role;

Route::middleware(['auth'])->group(function(){
//     Route::get('/link', function(){
//     Artisan::call('storage:link');
// });

Route::get('/config', function(){
    Artisan::call('config:clear');
});
});




