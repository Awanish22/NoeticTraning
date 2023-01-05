<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestController;
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

// Route::post('/add-student', [StudentController::class, 'store']);
// Route::get('/list', [StudentController::class, 'list']);
// Route::get('/student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
// Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
// Route::delete('/delete/{id}', [StudentController::class, 'destroy']);

//


// Route::get('getCountries', [DataController::class, 'getCountries']);
// Route::get('getStates', [DataController::class, 'getStates']);

// Route::get('data', [DataController::class, 'index']);

// Route::get('datas', [DataController::class, 'index']);
// Route::get('city', [DataController::class, 'getCities']);

//students

// Route::post('add-students', [StudentsController::class, 'store']);
// Route::get('/getCountries', [StudentsController::class, 'getCountries']);
// Route::get('state/{id}',[StudentsController::class,'state']);
// Route::get('/lists',[StudentsController::class,'lists']);
// Route::delete('/delete/{id}', [StudentsController::class, 'destroy']);
// Route::put('/student/update/{id}', [StudentsController::class, 'update']);
// // 
//Project

Route::get('/getCountries', [ProjectController::class, 'getCountries']);
Route::get('state/{id}',[ProjectController::class,'state']);
// Route::post('/add', [ProjectController::class, 'store']);
// Route::get('/lists',[ProjectController::class,'lists']);
// // Route::put('/update/{id}', [ProjectController::class, 'update']);
Route::get('/languages',[ProjectController::class,'languageGet']);
// Route::delete('/delete/{id}', [ProjectController::class, 'destroy']);
// Route::resource('/students','\App\Http\Controllers\ProjectController');

//Resource
Route::apiResource('/students','\App\Http\Controllers\TestController');
Route::get('/lists',[TestController::class,'lists']);
