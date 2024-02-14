<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\RunningFormController;
use App\Http\Controllers\RunningFormValueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource("forms", FormController::class);
Route::apiResource("forms/{form}/instances", RunningFormController::class);
Route::apiResource("form_response/{instance}", RunningFormValueController::class);
