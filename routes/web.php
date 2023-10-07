<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StudentRecordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollRecordController;

use App\Http\Middleware\UserMiddleWare;




Route::controller(UserAuthController::class) -> group(function(){

    Route::get('/', 'get') -> name('signin.form');

});


Route::controller(UserDataController::class) -> group(function(){

    Route::post('/create', 'create') -> name('user.create');
    Route::post('/login/user', 'signin') -> name('user.signin');

    Route::get('/user/lougout', 'logout') -> name('user.logout');
    Route::get('/create/account', 'signup') -> name('signup.form');
    Route::get('/dashboard', 'getdashboard') -> name('dashboard');

});


Route::controller(StudentRecordController::class) -> group(function(){

    Route::get('/studet/list', 'getAll') -> name('student.list');
    Route::get('/student/{student}/edit', 'getedit') -> name('student.edit');
    Route::get('/student/register/form', 'registerForm') -> name('student.register.form');

    Route::post('/register/student', 'create') -> name('student.create');
    Route::post('/student/{student}/update', 'edit') -> name('student.update');
    Route::post('/student/{student}/delete', 'delete') -> name('student.delete');
    
});


Route::controller(SubjectController::class) -> group(function(){

    Route::get('/subjects', 'get') -> name('subject.form');
    Route::post('/subjects/new', 'create') -> name('subject.create');
    Route::post('/suject/{subject}/delete', 'delete') -> name('subject.delete');
    
});


Route::controller(EnrollRecordController::class) -> group(function(){

    Route::post('/enrollment/create/{student}', 'create') -> name('enrollement.create');

});