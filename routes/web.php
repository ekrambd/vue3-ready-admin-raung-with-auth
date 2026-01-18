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

Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');

// Route::get('/do', function(){
//     $data = array();
//     $data['name'] = 'Admin';
//     $data['role_id'] = 1;
//     $data['email'] = 'admin@gmail.com';
//     $data['password'] = bcrypt('123456');
//     DB::table('users')->insert($data);
//     return back();
// });