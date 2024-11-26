<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCela extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'capacidade' => 'required|integer|min:1',
            'descricao' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome da cela é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válido.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'capacidade.required' => 'A capacidade é obrigatória.',
            'capacidade.integer' => 'A capacidade deve ser um número inteiro.',
            'capacidade.min' => 'A capacidade deve ser no mínimo 1.',
            'descricao.string' => 'A descrição deve ser um texto válido.',
            'descricao.max' => 'A descrição não pode exceder 1000 caracteres.',
        ];
    }
}
