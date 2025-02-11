@extends('layouts.app')

@section('content')
    <h2 class="mt-9 text-3xl text-white font-semibold mb-6">Lista de Celas</h2>

    <a href="{{ route('celas.create') }}" class="mt-3 inline-block text-white py-2 px-4 rounded-lg bg-gray-600 transition duration-300">
        Adicionar Nova Cela
    </a>

    <div class="overflow-x-auto mt-8">
        <table class="min-w-full bg-white text-gray-800 rounded-lg shadow-lg overflow-hidden">
            <thead class="bg-gray-600 text-white rounded-t-lg">
                <tr>
                    <th class="px-4 py-3 text-left text-sm">ID</th>
                    <th class="px-4 py-3 text-left text-sm">Nome</th>
                    <th class="px-4 py-3 text-left text-sm">Capacidade</th>
                    <th class="px-4 py-3 text-left text-sm">Descrição</th>
                    <th class="px-4 py-3 text-left text-sm">Data de Criação</th>
                    <th class="px-4 py-3 text-left text-sm">Última Atualização</th>
                    <th class="px-4 py-3 text-left text-sm">Número de Presos</th>
                    <th class="px-4 py-3 text-left text-sm">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach($celas as $cela)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm whitespace-nowrap bg-gray-100">{{ $cela->id }}</td>
                        <td class="px-4 py-3 text-sm whitespace-nowrap bg-gray-100">{{ $cela->nome }}</td>
                        <td class="px-4 py-3 text-sm whitespace-nowrap bg-gray-100">{{ $cela->capacidade }}</td>
                        <td class="px-4 py-3 text-sm max-w-xs whitespace-nowrap overflow-hidden text-ellipsis bg-gray-100" style="max-width: 150px;">
                            {{ $cela->descricao }}
                        </td>
                        <td class="px-4 py-3 text-sm whitespace-nowrap bg-gray-100">{{ \Carbon\Carbon::parse($cela->created_at)->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 text-sm whitespace-nowrap bg-gray-100">{{ \Carbon\Carbon::parse($cela->updated_at)->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 text-sm whitespace-nowrap bg-gray-100">{{ $cela->presos_count }}</td>
                        <td class="px-4 py-3 text-sm bg-gray-100" >
                            <div class="flex space-x-2 whitespace-nowrap ">
                                <a href="{{ route('celas.edit', $cela->id) }}" class="text-black hover:text-blue-800 font-semibold transition duration-300">Editar</a>

                                <span class="text-gray-400">|</span>

                                <button onclick="openDeleteModal({{ $cela->id }})" class="text-red-600 hover:text-red-800 font-semibold transition duration-300">Excluir</button>

                                <form id="delete-form-{{ $cela->id }}" action="{{ route('celas.destroy', $cela->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 transform transition-all duration-500 scale-75 opacity-0">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tem certeza que deseja excluir esta cela?</h3>
            <div class="flex justify-between">
                <button onclick="closeDeleteModal()" class="px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Cancelar</button>
                <button id="confirmDeleteBtn" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Excluir</button>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(celaId) {
            const modal = document.getElementById('deleteModal');
            const modalContent = modal.querySelector('div');

            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100', 'pointer-events-auto');

            modalContent.classList.remove('scale-75', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');

            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            confirmDeleteBtn.onclick = function() {
                document.getElementById('delete-form-' + celaId).submit();
            }
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const modalContent = modal.querySelector('div');

            modal.classList.add('opacity-0', 'pointer-events-none');
            modal.classList.remove('opacity-100', 'pointer-events-auto');

            modalContent.classList.add('scale-75', 'opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');
        }
    </script>
@endsection
