<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupport extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->routeIs('presos.*')) {
            return [
                'nome' => 'required|string|max:255',
                'documento_identidade' => 'required|string|max:255',
                'data_nascimento' => 'required|date',
                'crime' => 'required|string|max:255',
                'data_condenacao' => 'required|date',
                'status' => 'required|string|in:Detido,Liberado,Fugido',
                'cela_id' => 'required|exists:celas,id',
            ];
        } elseif ($this->routeIs('celas.*')) {
            return [
                'nome' => 'required|string|max:255',
                'capacidade' => 'required|integer|min:1',
                'descricao' => 'nullable|string|max:1000',
            ];
        }

        return [];
    }

    public function messages()
    {
        return [
            // Mensagens para Presos
            'nome.required' => 'O nome é obrigatório.',
            'documento_identidade.required' => 'O documento de identidade é obrigatório.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'crime.required' => 'O crime é obrigatório.',
            'data_condenacao.required' => 'A data de condenação é obrigatória.',
            'status.required' => 'O status é obrigatório.',
            'cela_id.required' => 'A cela é obrigatória.',

            // Mensagens para Celas
            'capacidade.required' => 'A capacidade é obrigatória.',
            'capacidade.integer' => 'A capacidade deve ser um número inteiro.',
            'capacidade.min' => 'A capacidade deve ser no mínimo 1.',
            'descricao.max' => 'A descrição não pode exceder 1000 caracteres.',
        ];
    }
}
