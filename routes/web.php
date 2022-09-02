<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    UserController,
    FuncaoController,
    FestaController,
    ConvidadoController,
    DjController,
    PermissaoController,
};

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->prefix('admin/')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::resource('users', UserController::class);
    Route::resource('festas', FestaController::class);
    Route::resource('convidados', ConvidadoController::class);
    Route::resource('djs', DjController::class);
    Route::resource('funcoes', FuncaoController::class)->parameters([
        'funcoes' => 'funcao'
    ]);
    Route::resource('permissoes', PermissaoController::class)->parameters([
        'permissoes' => 'permissao'
    ]);

    Route::controller(UserController::class)->prefix('/users/funcao')->group(function () {
        Route::get('/{id}', 'funcao')->name('users.funcao');
        Route::post('/{id}', 'funcaoStore')->name('users.funcao.store');
        Route::delete('/{id}', 'funcaoDestroy')->name('users.funcao.destroy');
    });
});

Auth::routes();
