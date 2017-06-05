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

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {


    $user = User::find(1);


    $user->roles()->save(new Role(['name' => 'administrator']));

});


Route::get('/read', function () {

    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {

        echo $role->name;
    }

});


Route::get('/update', function () {

    $user = User::findOrFail(1);

    if ($user->has('roles')) {

        foreach ($user->roles as $role) {


            if ($role->name == 'Administrator') {

                $role->name = 'subscriber';
                $role->save();
            }
        }

    }


});