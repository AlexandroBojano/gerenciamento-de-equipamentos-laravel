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

        $total = Equipment::where('status', '!=', 'inserviveis')->count();
           $pendentes = Equipment::where('status', 'pendente')->count();
           $aguardando = Equipment::where('status', 'aguardando_retirada')->count();
           $inserviveis = Equipment::where('status', 'inserviveis')->count();

        return view('dashboard', compact('user', 'total','pendentes', 'aguardando','inserviveis'));
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/users', [WebController::class, 'users']);
    Route::get('/users/{id}', [WebController::class, 'userId']);
    
    //Route::get('/add', [WebController::class, 'createUser']);
    
    Route::post('/add', [EquipmentController::class, 'equipamentsRegister']);
    
    Route::get('/list', [EquipmentController::class, 'equipamentsList']);
     Route::get('/list/{id}', [EquipmentController::class, 'equipamentsQueryId']);
    Route::get('/new', [EquipmentController::class, 'equipamentsForm']);
    //Route::post('/equipaments/add', [EquipmentController::class, 'equipamentsRegister']);
    // 
     Route::get('/show', [EquipmentController::class, 'show']);

     Route::get('/updateForm/{id}', [EquipmentController::class, 'updateForm']);
     Route::get('/deleteForm/{id}', [EquipmentController::class, 'deleteForm']);

     Route::put('/update/{id}', [EquipmentController::class, 'updateItem']);
     Route::delete('/delete/{id}', [EquipmentController::class, 'deleteItem']);
    
});