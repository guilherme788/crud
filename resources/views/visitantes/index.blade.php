@extends('layouts.app')

@section('content')
    <h2 class="mt-9 text-3xl text-white font-semibold mb-6">Lista de Visitantes</h2>

    <a href="{{ route('visitantes.create') }}" class="mt-3 inline-block bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-300">
        Adicionar Novo Visitante
    </a>

    <div class="overflow-x-auto mt-8">
        <table class="min-w-full bg-white text-gray-900 rounded-lg shadow-lg overflow-hidden">
            <thead class="bg-gray-600 text-white rounded-t-lg">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Nome</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Documento de Identidade</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Data de Criação</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Última Atualização</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach($visitantes as $visitante)
                    <tr class="hover:bg-gray-200 border-b border-gray-200 rounded-lg">
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-100">{{ $visitante->id }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-100">{{ $visitante->nome }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-100">{{ $visitante->documento_identidade }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-100">{{ $visitante->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-100">{{ $visitante->updated_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-100">
                            <div class="flex space-x-4 px-6 py-4 text-sm whitespace-nowrap bg-gray-100">
                                <a href="{{ route('visitantes.edit', $visitante->id) }}" class="text-black hover:text-indigo-800 font-semibold">
                                    Editar
                                </a>
                                <span class="text-gray-400">|</span>
                                <button onclick="openDeleteModal({{ $visitante->id }})" class="text-red-600 hover:text-red-800 font-semibold">
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 transform transition-all duration-500 scale-75 opacity-0">
            <h3 class="text-lg font-semibold text-gray-800">Tem certeza que deseja excluir este visitante?</h3>
            <div class="mt-4 flex justify-between">
                <button onclick="closeDeleteModal()" class="px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Cancelar</button>
                <form id="deleteForm" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Excluir</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(visitanteId) {
            const modal = document.getElementById('deleteModal');
            const modalContent = modal.querySelector('div');

            // Atualiza o formulário com o ID do visitante
            document.getElementById('deleteForm').action = '/visitantes/' + visitanteId;

            // Exibe o modal
            modal.classList.remove('hidden');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100', 'pointer-events-auto');
            modalContent.classList.remove('scale-75', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const modalContent = modal.querySelector('div');

            // Aplica a animação de fechamento
            modal.classList.add('opacity-0', 'pointer-events-none');
            modal.classList.remove('opacity-100', 'pointer-events-auto');
            modalContent.classList.add('scale-75', 'opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');

            // Esconde o modal após a animação
            setTimeout(function() {
                modal.classList.add('hidden');
            }, 500); // Espera 500ms para esconder o modal
        }
    </script>
@endsection
