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

/**
 *
 * Aqui estará sendo definido a mesma rota 'contato/' porém usando paramêtros
 * e tendo tratamento por REGEX (Expressões regulares).
 *
 * Eu prefiro usar a declaração de váriaveis em método camelCase, como: alexandreMuassab.
 * Porém você pode usar o formato que desejar, estarei passando outro exemplo:
 *
 * snake_case: alexandre_muassab.
 *
 * Caso você queira saber os formatos, veja: https://www.alura.com.br/artigos/convencoes-nomenclatura-camel-pascal-kebab-snake-case.
 */
Route::get('/contato/{name}/{categoryId}', function (
  string $name,
  int $categoryId,
)
{
  return "$name - $categoryId";
}
)
/**
  * Aqui estarei chamando uma função `where()`, aonde o primeiro paramêtro será:
  *
  *                  mesma coisa que [A-Za-z0-9_], de a-z ignorando diminutivo ou aumentativo e de 0-9 e pode ter _.
  *                  ↓
  * Expressão será: \w+
  *                   ↑
  *                   Essa expressão delimita que o valor pode se repetir várias vezes, exemplo: abbacaawz...
  *                   ↓
  *                    ↘ → Caso não ô adicione ele ira pegar o primeiro caracter, Ex: (a)b34w5z7c90
  */
  ->where('name', '\w+')
  /*
  * Aqui mesma mesma coisa, porém usando outra expressão:
  *
  * a rota, neste caso a rota é obrigatório cujo o nome é 'categoryId'.
  *
  * Segundo paramêtro é o REGEX, neste caso eu quero que o ID seja apenas número
  *
  *                  mesma coisa que [0-9], de 0 à 9 (/contato/bigode/1) ou (/contato/bigode/2)...
  *                  ↓
  * Expressão será: \d+
  *                   ↑
  *                   Aqui está novamente a expressão de 'repetição'
  */
  ->where('categoryId', '\d+');
  /*
  * Você pode aprender sobre REGEX usando o próprio site do PHP (Porém achei bem memes) ou usando um site que gosto bastante;
  * Referências:
  *
  * PHP: https://www.php.net/manual/en/reference.pcre.pattern.syntax.php;
  *
  * Regex101: https://regex101.com/
 */
