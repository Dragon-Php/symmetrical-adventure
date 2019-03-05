<?php

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

Route::get('/', function (App\User $user) {
    $users = $user->withAllStatus()->get();
    $result = [];
    foreach ($users as $key => $value) {
    	$result[] = $value->id .' => '. $value->name;
    }
    dd($result);
});

Route::get('Virus-Found', function(){
	//
})->name('virus');
