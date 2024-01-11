<?php

use App\Http\Controllers\PositionlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

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

Route::post('/set',[PositionlogController::class,'incominglog']);
Route::get('/get',[PositionlogController::class,'last50']);
Route::get('/mytrip/{device}',[PositionlogController::class,'myTrip']);
Route::post('/test',function(Request $request){
    $posted = $request->json()->all();
    $resp = "Sent from $posted[lat] , $posted[lon] using your $posted[dev]";
    return $resp . "\n";
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
