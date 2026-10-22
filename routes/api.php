<?php

use App\Http\Controllers\Api\Bookcontroller;
use Illuminate\Support\Facades\Route;

Route::apiResource('books', Bookcontroller::class);
