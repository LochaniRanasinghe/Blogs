<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;

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
    return view('welcome');
});

/*-----------------------------------------USER ROUTES------------------------------------------*/
//show register/create form
Route::get('/register', [UserController::class, 'create'])->name('register');


//Create new user
Route::post('/users', [UserController::class, 'store'])->name('users.create');


//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']); 

//user logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


/*-----------------------------------------Post ROUTES------------------------------------------*/
//Show post creating form
Route::get('/posts/create', [PostsController::class,'create'])->name('post.create')->middleware('auth');

//Store post details in the database
Route::post('/posts', [PostsController::class,'store'])->middleware('auth');

//Show all posts
Route::get('/', [PostsController::class,'index'])->name('home');

//Show a single post
Route::get('/posts/{postId}', [PostsController::class,'show'])->name('post.show');


//Manage Posts(Show table of all posts of the logged in user)
Route::get('/posts/manage', [PostsController::class,'manage'])->name('post.manage')->middleware('auth');

//Show the edit form
// Route::get('/posts/{postId}/edit', [PostsController::class,'edit'])->name('post.edit')->middleware('auth');
//Method2
Route::get('/posts/{post}/edit', [PostsController::class,'edit'])->name('post.edit')->middleware('auth');//Update the post details in the database


// Route::put('/posts/{postId}/update', [PostsController::class,'update'])->name('post.update')->middleware('auth');
//Method2
Route::put('/posts/{post}', [PostsController::class,'update'])->name('post.update')->middleware('auth');