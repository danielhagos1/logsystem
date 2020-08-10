<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    
   Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]); 
   Route::resource('/company', 'CompanyController');
   Route::resource('/department', 'DepartmentController');
   Route::resource('/post', 'PostController');

});

Route::resource('/post', 'PostController', ['except'=>['create','edit','destroy']]);
Route::get('/template','TemplateController@temp');