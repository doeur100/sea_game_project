<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeamComtroller;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\Schedule;
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

//Route Users
Route::get('/users',[UserController::class,'index']);
Route::post('/users',[UserController::class,'store']);
//Route Events
Route::get('/events',[EventController::class,'index']);
Route::get('/events/{id}',[EventController::class,'show']);
Route::post('/events',[EventController::class,'store']);
Route::put('/events/{id}',[EventController::class,'update']);
Route::delete('/events/{id}',[EventController::class,'destroy']);
//Route Schedule
Route::get('/schedules',[ScheduleController::class,'index']);
Route::get('/schedules/{id}',[ScheduleController::class,'show']);
Route::post('/schedules',[ScheduleController::class,'store']);
Route::put('/schedules/{id}',[ScheduleController::class,'update']);
Route::delete('/schedules/{id}',[EventController::class,'destroy']);
//Route Competition
Route::post('/competitions',[CompetitionController::class,'store']);
Route::get('/competitions',[CompetitionController::class,'index']);
//Route Team
Route::get('/teams',[TeamController::class,'index']);
Route::post('/teams',[TeamController::class,'store']);