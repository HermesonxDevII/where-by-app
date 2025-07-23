<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingRequest extends FormRequest
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
            'name'            => 'required|string',
            'description'     => 'nullable|string',
            'end_dateTime'    => 'required|string',
            'type'            => 'required|string',
            'record_trigger'  => 'required|string',
            'record_type'     => 'required|string',
            'record_location' => 'required|string',
            'record_format'   => 'required|string',
            'is_locked'       => 'nullable|boolean'
        ];
    }
}
