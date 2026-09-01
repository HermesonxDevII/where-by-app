<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ DB };

use App\Http\Controllers\Controller;
use App\Models\{ Provider };
use App\Http\Requests\Providers\{ StoreUpdateRequest };

class ProviderController extends Controller
{
  public function index(Request $request) {
    $providers = Provider::get();

    return view('providers.index', compact('providers'));
  }

  public function create(Request $request) { }

  public function store(StoreUpdateRequest $request) { }

  public function edit(Request $request) { }

  public function update(StoreUpdateRequest $request, Provider $provider)
  {
    $validated = $request->validated();

    DB::beginTransaction();

    try {
      if ($validated['active']) {
        Provider::where('id', '!=', $provider->id)
          ->where('active', true)
          ->update(['active' => false]);
      }

      $provider->update([
        'base_url'      => $validated['base_url'],
        'base_api_url'  => $validated['base_api_url'] ?? null,
        'account_id'    => $validated['account_id'] ?? null,
        'client_id'     => $validated['client_id'] ?? null,
        'client_secret' => $validated['client_secret'] ?? null,
        'secret_token'  => $validated['secret_token'] ?? null,
        'active'        => $validated['active'],
      ]);

      DB::commit();

      notify('Provedor atualizado com sucesso!');
      return back();
    } catch (\Throwable $e) {
      DB::rollBack();

      notify('Ocorreu um erro ao tentar atualizar o provedor.', 'error');
      reportError('ProviderController.update', $e);
      return back();
    }
  }

  public function destroy(Request $request) { }
}
