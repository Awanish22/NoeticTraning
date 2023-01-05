<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::resource('users',\App\Http\Controllers\UserController::class)->except('create','show','edit');
// Route::get('/student',[StudentController::class,'index']);
// Route::get('/users',[UserController::class,'index']);
// Route::post('/create',[UserController::class,'create']);
// Route::post('/user/{id}',[UserController::class,'index']);
// Route::post('user/update/{id}',[UserController::class,'index']);
// Route::delete('user/delete/{id}',[UserController::class,'index']);

Route::get('/article', [ArticleController::class, 'index']);
Route::post('/article', [ArticleController::class, 'store']);
Route::patch('/article/edit/{id}', [ArticleController::class, 'update']);
Route::delete('/article/delete/{id}', [ArticleController::class, 'delete']);
// //Comment
// Route::get('/comments', [CommentController::class, 'index']);
// Route::get('/comment', [CommentController::class, 'store']);

//New
// Route::get('/add', [ViewController::class, 'index']);
// Route::get('/edit', [ViewController::class, 'edit']);
// Route::get('/list', [ViewController::class, 'list']);
//student
// Route::get('students', [StudentsController::class, 'index']);
// Route::get('/student/edit/{id}', [StudentsController::class, 'edit']);
// Route::get('list',[StudentsController::class,'list']);

//Project
// Route::get('/add', [ProjectController::class, 'index']);
// Route::get('/list', [ProjectController::class, 'list']);
// Route::get('/project/edit/{id}', [ProjectController::class, 'edit']);

//Resource
Route::get('/add', [TestController::class, 'index']);
Route::get('/list', [TestController::class, 'list']);
Route::get('/test/edit/{id}', [TestController::class, 'edit']);
