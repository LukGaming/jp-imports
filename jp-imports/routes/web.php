<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ImagemClienteController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\ProdutoController;

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
    return view('welcome');
});

Route::resource('clientes', ClienteController::class);
/*Rota para CRUD do telefone do Cliente*/
Route::any('removerTelefone/{id_telefone}', [TelefoneController::class, 'removerTelefone'])->name('TelefoneController.removerTelefone');
Route::any('adicionarNumeros/{id_cliente}', [TelefoneController::class, 'adicionarNumeros'])->name('TelefoneController.adicionarNumeros');

/*Rota para CRUD da imagem do CLiente*/
Route::any('removerImagem/{id_cliente}', [ImagemClienteController::class, 'removerImagem'])->name('ImagemClienteController.removerImagem');
Route::any('adicionarImagem/{id_cliente}', [ImagemClienteController::class, 'adicionarImagem'])->name('ImagemClienteController.adicionarImagem');
Route::any('editarImagem/{id_cliente}', [ImagemClienteController::class, 'editarImagem'])->name('ImagemClienteController.editarImagem');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


