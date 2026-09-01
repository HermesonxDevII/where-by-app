<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\{ Provider };

class ProviderController extends Controller
{
  public function index(Request $request) {
    $providers = Provider::get();

    return view('providers.index', compact('providers'));
  }
}
