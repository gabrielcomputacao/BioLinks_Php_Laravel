<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\DashBoard;
use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Coloca todas essas routas em um middleware de convidade(guest) podendo acessar sem estar autenticado
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');

    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {

    Route::get('/logout', LogoutController::class)->name('logout');

    // middleware fala para deixar passar essa requisicao somente se a pessoa tiver usuario
    // ->name coloca como se fosse um apelido para a rota, para nao precisar digitar o caminho
    Route::get('/dashboard', DashBoard::class)->name('dashboard');
    Route::get('/links/create', [LinkController::class, 'create'])->name('links/create');

    Route::post('/links/create', [LinkController::class, 'store']);
});
