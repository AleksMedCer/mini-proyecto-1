<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVentaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'producto_id' => 'required|exists:productos,id',
            'vendedor_id' => 'required|exists:users,id',
            'cliente_id' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:1',
        ];
    }
}