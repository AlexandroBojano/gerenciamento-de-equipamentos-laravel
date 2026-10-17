<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Models\Equipment;

Route::get('/', fn () => redirect('/dashboard'));

Route::middleware('guest')->group(function () {
    Route::get('/login', fn () => view('login'))->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', fn () => view('register'));
    Route::post('/register', [UserController::class, 'register']);

   
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {

        $user = Equipment::all();
        return view('dashboard', compact('user'));
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/users', [WebController::class, 'users']);
    Route::get('/users/{id}', [WebController::class, 'userId']);
    
    //Route::get('/add', [WebController::class, 'createUser']);
    
    Route::post('/dashboard/admin/equipamentos/add', [EquipmentController::class, 'equipamentsRegister']);
    
    Route::get('/dashboard/admin/equipamentos/lista', [EquipmentController::class, 'equipamentsList']);
    Route::get('/dashboard/admin/equipamentos/novo', [EquipmentController::class, 'equipamentsForm']);
    //Route::post('/equipaments/add', [EquipmentController::class, 'equipamentsRegister']);
    // 
     Route::get('/show', [EquipmentController::class, 'show']);

    
});