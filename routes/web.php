<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar el formulario de registro en la ruta principal
Route::get('/', function () {
    return view('registerUser'); // Asegúrate de que esta vista exista
});

// Ruta para manejar la solicitud POST del formulario de registro
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
