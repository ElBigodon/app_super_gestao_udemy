<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function main(int $p1, int $p2)
  {
    /**
     * $p1 e $p2, serão transmitidos através da view, possiblitando que o mesmo use esses dois parâmetros
     *
     * Usando Array Associativa:
     * return view('site/test', ['p1' => $p1, 'p2' => $p2]);
     *
     * Usando Compact:
     * return view('site/test', compact('p1', 'p2'));
     *
     * Usando With:
     * return view('site/test')->with('p1', $p1)->with('p2', $p2);
     *
     * estarei usando o método `compact()` pois eu ô achei a melhor forma de passar os paramêtros */
    return view('site/test', compact('p1', 'p2'));
  }
}
