@extends('layouts.app')

@section('content')
    <h2 class="mt-2 text-3xl text-white font-semibold mb-5">Editar Cela</h2>

    <form action="{{ route('celas.update', $cela->id) }}" method="POST" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg max-w-5xl mx-auto">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="nome" class="block text-white font-semibold mb-2">Nome da Cela</label>
                <input type="text" name="nome" id="nome" class="mt-2 p-4 w-full bg-gray-700 text-white border border-gray-600 rounded-md focus:ring-2 focus:ring-indigo-500" value="{{ old('nome', $cela->nome) }}" required>
            </div>
            <div>
                <label for="capacidade" class="block text-white font-semibold mb-2">Capacidade</label>
                <input type="number" name="capacidade" id="capacidade" class="mt-2 p-4 w-full bg-gray-700 text-white border border-gray-600 rounded-md focus:ring-2 focus:ring-indigo-500" value="{{ old('capacidade', $cela->capacidade) }}" required>
            </div>
        </div>

        <div>
            <label for="descricao" class="block text-white font-semibold mb-2">Descrição</label>
            <textarea name="descricao" id="descricao" rows="4" class="mt-2 p-4 w-full bg-gray-700 text-white border border-gray-600 rounded-md focus:ring-2 focus:ring-indigo-500">{{ old('descricao', $cela->descricao) }}</textarea>
        </div>

        <div class="mt-6 flex justify-between">
            <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Atualizar Cela
            </button>
            <a href="{{ route('celas.index') }}" class="bg-gray-500 text-white px-8 py-3 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Voltar
            </a>
        </div>
    </form>
@endsection
