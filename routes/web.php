<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\MainController@main');

Route::get('/sobre', 'App\Http\Controllers\AboutController@about');

Route::get('/contato', 'App\Http\Controllers\ContactController@contact');

/**
 * Essa rota terá 4 parametros, sendo elas:
 * [name, category, subject, message]
 *
 * Caso seja especificado o parametro na rota, o mesmo será inserido na função
 *
 *
 *           Rota ↓              ↓ Parametros ↓                ↓ Função (Callback)
 */
Route::get('/contato/{name}/{category}/{subject}/{message}', function (
  string $name,
  string $category,
  string $subject,
  string $message
)
{
  return "Olá $name, sobre o seu assunto: '$subject', com a sua mensagem: '$message' estaremos passando para o setor $category";
});
