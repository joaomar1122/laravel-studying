<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class NotaRequest extends FormRequest
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
        'nome_cliente'=>'required',
        'tipo_servico'=>'required',
        'data_nota'=>'required',
        'preco_nota'=>'required',
        'id_status'=>'required',
        'id_pagamento'=>'required',
        ];
    }
}