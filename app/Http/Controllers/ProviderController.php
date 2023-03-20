<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
  public function main()
  {
    $providers = ['Fornecedor 1'];
    return view('app.provider.main', compact('providers'));
  }
}
