<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngArqAsesoresController;

Route::get('/', function () {
    return view('Layout.Index');
});

/* CATEGORÍA ING & ARQ */
    /* Asesores */
    Route::resource('asesores', IngArqAsesoresController::class)->names('asesores');









