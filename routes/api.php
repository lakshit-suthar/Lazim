<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post("register",[AuthController::class,'register']);
Route::post("login",[AuthController::class,'login']);

Route::group(["middleware" => ["auth:sanctum"]],function(){
    Route::post("task/add",[TaskController::class,'store']);
    Route::get("task/list",[TaskController::class,'list']);
    Route::get("task/{id}/edit",[TaskController::class,'edit']);
    Route::put("task/{id}/update",[TaskController::class,'update']);
    Route::delete("task/{id}/delete",[TaskController::class,'destroy']);

    //logout
    Route::get("logout",[AuthController::class,'logout']);
})

?>