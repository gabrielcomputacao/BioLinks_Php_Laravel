<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

// middleware fala para deixar passar essa requisicao somente se a pessoa tiver usuario
// ->name coloca como se fosse um apelido para a rota, para nao precisar digitar o caminho
Route::get('/dashboard', fn() => 'dashbord :: ' . auth()->id())->middleware('auth')->name('dashboard');
