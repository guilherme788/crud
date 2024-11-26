@extends('layouts.app')

@section('content')
    <h2 class="text-3xl text-white font-semibold mb-6">Lista de Comportamentos</h2>

    <!-- Botão para Adicionar Novo Comportamento -->
    <a href="{{ route('comportamento.create') }}" class="mt-4 inline-block bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300">
        Adicionar Novo Comportamento
    </a>

    <!-- Tabela de Comportamentos -->
    <div class="overflow-x-auto mt-8">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Preso</th>
                    <th class="px-6 py-4 text-left">Descrição</th>
                    <th class="px-6 py-4 text-left">Data de Criação</th>
                    <th class="px-6 py-4 text-left">Última Atualização</th>
                    <th class="px-6 py-4 text-left">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach($comportamentos as $comportamento)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $comportamento->id }}</td>
                        <td class="px-6 py-4">{{ $comportamento->preso->nome ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $comportamento->descricao }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($comportamento->created_at)->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($comportamento->updated_at)->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('comportamento.edit', $comportamento->id) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Editar</a> |
                            <form action="{{ route('comportamento.destroy', $comportamento->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
