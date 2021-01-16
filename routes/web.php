<?php

use App\Task;
use Illuminate\Http\Request;


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

// トップ画面表示
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks/create', function () {
    return view('tasks_create');
});

// 依頼～一覧表示（管理用）
Route::get('/tasks/index','TaskController@index');

// 依頼～一覧表示（依頼者用）
Route::get('/tasks/index_r','TaskController@index_r');

// 依頼～一覧表示（請負者用）
Route::get('/tasks/index_u','TaskController@index_u');

// 依頼～一覧表示（請負者用２）
Route::get('/tasks/index_u_2','TaskController@index_u_2');

// 依頼～個別表示
Route::get('/tasks/show/{id}','TaskController@show');

// 依頼～個別表示（請負者用）
Route::get('/tasks/show_r/{id}','TaskController@show_r');

// 依頼～個別表示（請負者用）
Route::get('/tasks/show_u/{id}','TaskController@show_u');

// 依頼～新規登録画面表示
Route::get('/tasks/create','TaskController@create');

// 依頼～登録
Route::post('/tasks/store','TaskController@store');

// 依頼～修正画面表示
Route::get('/tasks/edit/{id}','TaskController@edit');

// 依頼～更新
Route::post('/tasks/update','TaskController@update');

// 依頼～削除
Route::post('/tasks/destroy/{id}','TaskController@destroy');

// 依頼～完了確認
Route::post('/tasks/comfirm_accomplish','TaskController@comfirm_accomplish');

// 請負
Route::post('/tasks/undertake','TaskController@undertake');

// 請負～請負取下げ
Route::post('/tasks/undertake_cancel','TaskController@undertake_cancel');

// 請負～完了確認依頼
Route::post('/tasks/comfirmation_request','TaskController@comfirmation_request');

Route::get('/users/edit','UserController@user_edit');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
