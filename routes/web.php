<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StudentRecordController;




//Route::view('/create/account', 'signup') -> name('signup.form');
//Route::view('/register', 'student-register') -> name('register');


Route::controller(UserAuthController::class) -> group(function(){
    Route::get('/', 'get') -> name('signin.form');
});


Route::controller(UserDataController::class) -> group(function(){
    Route::post('/create', 'create') -> name('user.create');
    Route::post('/login/user', 'signin') -> name('user.signin');
    Route::get('/dashboard/{userid}', 'getdashboard') -> name('dashboard');
    Route::get('/user/lougout', 'logout') -> name('user.logout');
    Route::get('/create/account', 'signup') -> name('signup.form');

});

Route::controller(StudentRecordController::class) -> group(function(){
    Route::post('/register/student', 'create') -> name('student.create');
    Route::get('/studet/list', 'getAll') -> name('student.list');
    Route::get('/student/{student}/edit', 'getedit') -> name('student.edit');
    Route::post('/student/{student}/update', 'edit') -> name('student.update');
    Route::post('/student/{student}/delete', 'delete') -> name('student.delete');
    Route::get('/student/register/form', 'registerForm') -> name('student.register.form');
});
