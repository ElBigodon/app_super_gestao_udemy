<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
  public function main()
  {
    $providers = [
      0 => ['name' => 'Fornecedor 1', 'status' => false],
      1 => ['name' => 'Fornecedor 2', 'status' => true],
    ];
    return view('app.provider.main', compact('providers'));
  }
}
