<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;

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

Auth::routes();



Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/p/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/p/{post}', [App\Http\Controllers\PostController::class, 'show']);

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');



/*
Route::get('home', [App\Http\Controllers\ProfilesController::class, 'home']);
Route::get('/about', [App\Http\Controllers\ProfilesController::class, 'about']);
Route::get('/service', 'ProfilesController@service');
Route::view('page', 'page');
Route::view('my_form', 'form');
Route::post('formSubmit', [App\Http\Controllers\Form::class, 'index']);

Route::get('/web', function () {
   return view('web', array('data'=>array('name'=>'uzair')));
});

Route::view('news1', 'news1')->middleware('UserType');
Route::view('news2', 'news2');

Route::view('denied','denied');

Route::get('session_get', [App\Http\Controllers\ProfilesController::class, 'session_get']);
Route::get('session_set', [App\Http\Controllers\ProfilesController::class, 'session_set']);
Route::get('session_remove', [App\Http\Controllers\ProfilesController::class, 'session_remove']);
Route::get('session_check', [App\Http\Controllers\ProfilesController::class, 'session_check']);

Route::view('usercheck','usercheck');
Route::post('userformSubmit', [App\Http\Controllers\ProfilesController::class, 'userformSubmit']);

Route::get('/logout', function () {
   session()->forget('name');
   session()->flash('error','logout success');
   return redirect('usercheck');
});

Route::get('getdata', [App\Http\Controllers\ProfilesController::class, 'mastan']);


Route::get('checkdb', [App\Http\Controllers\Checkdb::class, 'database']);

*/