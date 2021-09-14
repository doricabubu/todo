<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoItemController;

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

Route::post('register', function (Request $request) {
    return UserController::register($request);
});

Route::post('login', function (Request $request) {
    return UserController::login($request);
});

Route::post('change_password', function (Request $request) {
    return UserController::changePassword($request);
});

Route::post('get_list', function (Request $request) {
    return TodoItemController::getList($request);
});

Route::post('add_to_list', function (Request $request) {
    return TodoItemController::addToList($request);
});

Route::post('delete_from_list', function (Request $request) {
    return TodoItemController::deleteFromList($request);
});

Route::post('toggle_done', function (Request $request) {
    return TodoItemController::toggleDone($request);
});
