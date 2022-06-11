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

    $api->group(["prefix"=>"auth"],function($api){
        $api->post("/register",[UserController::class,"store"]);
        $api->post("/login",[AuthController::class,"login"]);
        $api->group(["middleware"=>"api"],function($api){
            $api->post("/me",[AuthController::class,"me"]);
            $api->post("/token/refresh",[AuthController::class,"refresh"]);
            $api->post("/logout",[AuthController::class,"logout"]);
        });
    });



});
