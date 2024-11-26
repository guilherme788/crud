@extends('layouts.app')

@section('content')
    <h2 class="mt-9 text-3xl text-white font-semibold mb-6">Editar Visita</h2>

    <form action="{{ route('visitas.update', $visita->id) }}" method="POST" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg max-w-5xl mx-auto">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="preso_id" class="block text-white font-semibold mb-2">Preso</label>
                <select name="preso_id" id="preso_id" class="w-full px-4 py-3 bg-gray-700 text-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach ($presos as $preso)
                        <option value="{{ $preso->id }}" {{ $visita->preso_id == $preso->id ? 'selected' : '' }}>
                            {{ $preso->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="visitante_id" class="block text-white font-semibold mb-2">Visitante</label>
                <select name="visitante_id" id="visitante_id" class="w-full px-4 py-3 bg-gray-700 text-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach ($visitantes as $visitante)
                        <option value="{{ $visitante->id }}" {{ $visita->visitante_id == $visitante->id ? 'selected' : '' }}>
                            {{ $visitante->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="data_visita" class="block text-white font-semibold mb-2">Data da Visita</label>
            <input type="datetime-local" name="data_visita" id="data_visita" class="w-full px-4 py-3 bg-gray-700 text-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   value="{{ $visita->data_visita ? $visita->data_visita->format('Y-m-d\TH:i') : old('data_visita') }}">
        </div>

        <div class="mt-6 flex justify-between">
            <button type="submit" class="inline-block bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-4 focus:ring-indigo-500">
                Atualizar Visita
            </button>
            <a href="{{ route('visitas.index') }}" class="inline-block bg-gray-600 text-white py-3 px-6 rounded-lg hover:bg-gray-700 transition duration-300 mt-4 ml-4">
                Voltar
            </a>
        </div>
    </form>
@endsection
