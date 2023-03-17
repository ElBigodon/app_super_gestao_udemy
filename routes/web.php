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
 * Caso seja especificado o parametro na rota, o mesmo será inserido na função.
 *
 * Caso o paramêtro seja opcional, podemos adicionar um '?' dentro do '{}',
 *
 * Exemplo: {message?}
 *
 * Porém dessa forma a variável dentro da função tem que ser tratada, caso contrário
 * irá retornar uma mensagem de erro do Laravel.
 *
 * A rota tem que seguir uma padrão, sempre defina uma rota padrão com valor ou não
 * seguindo de paramêtros opcionais, exemplo:
 *
 *                     ?        !          !         ?
 * ERRADO* /contato/{name?}/{category}/{subject}/{message?}
 *
 *                    !        !          ?         ?
 * CERTO* /contato/{name}/{category}/{subject?}/{messagem?}
 *
 * OBS: ! (Obrigatório), ? (Opcional)
 *
 * Para definir uma valor padrão da variável, podemos usar $message = '' ← (Valor padrão).
 *
 *           Rota ↓              ↓ Parametros ↓                ↓ Função (Callback)
 */
Route::get('/contato/{name}/{category}/{subject}/{message?}', function (
  string $name, // Variável
  string $category,
  string $subject,
  string $message = 'Mensagem não foi informada.' // Variável com valor padrão
)
{
  return "Olá $name, sobre o seu assunto: '$subject', com a sua mensagem: '$message' estaremos passando para o setor $category";
});
