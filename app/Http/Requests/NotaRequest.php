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
    public function messages(): array
{
    return [
        'nome_cliente.required' => 'O campo Nome do Cliente é obrigatório.',
        'tipo_servico.required' => 'O campo Tipo de Serviço é obrigatório.',
        'data_nota.required' => 'O campo Data é obrigatório.',
        'preco_nota.required' => 'O campo Preço é obrigatório.',
        'id_status.required' => 'O campo Status de Pagamento é obrigatório.',
        'id_pagamento.required' => 'O campo Forma de Pagamento é obrigatório.',
    ];
}

}
