<?php

namespace App\Http\Requests\Providers;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'base_url'      => 'required|string',
      'base_api_url'  => 'nullable|string',
      'account_id'    => 'nullable|string',
      'client_id'     => 'nullable|string',
      'client_secret' => 'nullable|string',
      'secret_token'  => 'nullable|string',
      'active'        => 'required|boolean',
    ];
  }

  public function attributes()
  {
    return [
      'base_url'      => 'URL Base',
      'base_api_url'  => 'URL Base da API',
      'account_id'    => 'ID da Conta',
      'client_id'     => 'ID do Cliente',
      'client_secret' => 'ID Secreto do Cliente',
      'secret_token'  => 'Token',
      'active'        => 'Ativo',
    ];
  }

  public function messages()
  {
    return [
      'base_url.required'      => 'O campo "URL Base" é obrigatório.',
      'base_url.string'        => 'O campo "URL Base" deve ser um texto.',

      'base_api_url.string'    => 'O campo "URL Base da API" é inválido!',
      'account_id.string'      => 'O campo "ID da Conta" é inválido!',
      'client_id.string'       => 'O campo "ID do Cliente" é inválido!',
      'client_secret.string'   => 'O campo "ID Secreto do Cliente" é inválido!',
      'secret_token.string'    => 'O campo "Token" é inválido!',

      'active.required'        => 'O campo "Ativo" é obrigatório!',
      'active.boolean'         => 'O campo "Ativo" deve ser verdadeiro ou falso.',
    ];
  }
}
