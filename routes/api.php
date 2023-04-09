<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ListOfTodoListsController;
use App\Http\Controllers\Api\TodoListController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;

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

Route::controller(UserController::class)->group(function () {
    Route::post('login', 'loginUser');
});

Route::controller(UserController::class)->group(function () {

    Route::get('user', 'getUserDetail');
    Route::get('logout', 'userLogout');
})->middleware('auth:api');

Route::get('listOfTodoLists', [ListOfTodoListsController::class, 'index'])->middleware('auth:api');
Route::get('listOfTodoListsWithThingsTodo/{id}', [ListOfTodoListsController::class, 'listOfTodoList']);
Route::get('listOfTodoLists/{id}', [ListOfTodoListsController::class, 'show']);
Route::post('listOfTodoLists', [ListOfTodoListsController::class, 'store']);
Route::patch('listOfTodoLists/{id}', [ListOfTodoListsController::class, 'update']);
Route::delete('listOfTodoLists/{id}', [ListOfTodoListsController::class, 'destroy']);

Route::get('listAction', [TodoListController::class, 'index']);
Route::get('listAction/{id}', [TodoListController::class, 'showListActionInTodoList']);
Route::post('listAction', [TodoListController::class, 'store']);
Route::patch('listAction/{id}', [TodoListController::class, 'update']);
Route::delete('listAction/{id}', [TodoListController::class, 'destroy']);
