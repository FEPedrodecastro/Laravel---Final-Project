<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VocationalTestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::fallback(function () {
    $data = [
        'title' => 'Página não encontrada'
    ];

    return view('fallback', $data);
})->name('fallback');


Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/sobre-nos', [UserController::class, 'sobreNos'])->name('sobre-nos');
Route::get('/guia-portal', [UserController::class, 'guiaPortal'])->name('guia');
Route::get('/contactos', [UserController::class, 'contactos'])->name('contactos');
Route::post('/enviar-mensagem', [UserController::class, 'enviarMensagem'])->name('enviar-mensagem');


// Route with Middleware

// Routes out app
Route::middleware('CheckLogout')->group(function() {
    Route::get('/registo-estudante', [UserController::class, 'registoEstudante'])->name('registo-estudante');
    Route::post('/registo-estudante_submit', [UserController::class, 'registoEstudante_submit'])->name('registo-estudante_submit');
    Route::get('/registo-instituicao', [UserController::class, 'registoInstituicao'])->name('registo-instituicao');
    Route::post('/registo-instituicao_submit', [UserController::class, 'registoInstituicao_submit'])->name('registo-instituicao_submit');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login_submit', [UserController::class, 'login_submit'])->name('login_submit');
    Route::get('/recuperar-password', [UserController::class, 'recuperarPassword'])->name('recuperar-password');
    Route::post('/recuperarPassword_submit', [UserController::class, 'recuperarPassword_submit'])->name('recuperarPassword_submit');
});

// Routes in app for every users
Route::middleware('CheckLogin')->group(function() {
    Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

});

// Routes in app for students type
Route::middleware(['CheckLogin', 'CheckUserType:1'])->group(function() {
    Route::get('/teste-vocacional-intro', [UserController::class, 'vocacionaltestIntro'])->name('teste-vocacional-intro');
    Route::get('/teste-vocacional', [VocationalTestController::class, 'vocationaltest'])->name('teste-vocacional');
    Route::get('/teste-vocacional-resultados', [UserController::class, 'testeVocacionalResultados'])->name('teste-vocacional-resultados'); 
});


// Routes in app for institutions type
Route::middleware(['CheckLogin', 'CheckUserType:2'])->group(function() {
    Route::get('/resultados-estatisticos', [UserController::class, 'resultadosInstituicao'])->name('resultados-estatisticos');
});




