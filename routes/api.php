<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


$api = app("Dingo\Api\Routing\Router");

$api->version('v1', function ($api) {

    $api->get("/",function(){
        return "Welcome to the Shopping Store API !!!";
    });

    $api->post("/users/register",[UserController::class,"store"]);
    $api->post("/users/login",[AuthController::class,"login"]);

});
