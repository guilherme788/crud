<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-400">

    <!-- Navbar -->
    <div class="bg-black text-white p-4 fixed w-full top-0 left-0 z-10">
        <div class="flex justify-between items-center">
            <!-- Nome da Delegacia -->
            <div class="text-lg font-semibold text-white">
                Delegacia
            </div>

            <!-- Nome do Usuário e Opções de Logout -->
            <div class="flex items-center space-x-6">
                <span class="text-lg font-semibold text-white bg-white-500 px-4 py-2 rounded-full shadow-md hover:bg-yellow-600 transition duration-300 ease-in-out">
                    Bem-vindo
                    {{ auth()->user()->name }}
                </span>
                <div class="relative">
                    <button id="dropdownButton" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none">
                        Opções
                    </button>
                    <div id="dropdownMenu" class="dropdown-content absolute right-0 hidden bg-gray-700 text-white text-sm rounded-lg shadow-lg mt-2 w-48 hover:bg-red-500">
                        <!-- Logout Form -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block py-2 px-4  hover:text-white rounded-md transition duration-300 ease-in-out">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script para mostrar/ocultar o dropdown
        document.querySelector('#dropdownButton').addEventListener('click', function () {
            const dropdown = document.querySelector('#dropdownMenu');
            dropdown.classList.toggle('hidden');
        });
    </script>

    <!-- Sidebar -->
    <div class="flex mt-16">
        <div class="w-64 h-screen bg-black text-white fixed top-0 left-0 shadow-xl">
            <div class="px-6 py-4 border-b border-gray-800 flex justify-between items-center">
                <!-- Nome da Delegacia na Sidebar -->
                <h2 class="text-lg font-semibold text-white">Delegacia</h2>
            </div>
            <div class="space-y-6 mt-8">
                <a href="{{ route('dashboard') }}" class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-gray-700 hover:text-white-200 rounded-md transition duration-200 ease-in-out">
                    Inicio
                </a>
                <a href="{{ route('presos.index') }}" class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-gray-700 hover:text-white-500 rounded-md transition duration-200 ease-in-out">
                    Presos
                </a>
                <a href="{{ route('celas.index') }}" class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-gray-700 hover:text-white-500 rounded-md transition duration-200 ease-in-out">
                    Celas
                </a>
                <a href="{{ route('visitas.index') }}" class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-gray-700 hover:text-white-500 rounded-md transition duration-200 ease-in-out">
                    Visitas
                </a>
                <a href="{{ route('visitantes.index') }}" class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-gray-700 hover:text-white-500 rounded-md transition duration-200 ease-in-out">
                    Visitantes
                </a>
            </div>
        </div>

        <!-- Conteúdo principal com borda -->
        <div class="flex-1 ml-64 h-screen bg-black p-5 pt-16 overflow-y-auto border-l border-gray-400">
            <div class="bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg transition-shadow duration-300">
                <div class="p-6 text-gray-900">
                    <h2 class="text-4xl font-extrabold text-white mb-6">{{ __("Você está logado!") }}</h2>
                    <p class="text-lg text-gray-100 mb-8">Bem-vindo, ao painel administrativo da delegacia. Aqui você pode gerenciar todas as informações importantes com eficiência e rapidez.</p>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                        <!-- Card de Presos com link -->
                        <a href="{{ route('presos.index') }}" class="bg-white text-black p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:translate-y-2">
                            <h3 class="text-xl font-semibold mb-4">Total de Presos</h3>
                            <p class="text-5xl font-extrabold">{{ $quantidadePresos }}</p>
                            <div class="mt-6 flex items-center space-x-2 text-white-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4 4m0 0l4-4m-4 4l-4 4m4-4V6m-4 4V6m-6 12V9m6 3h6a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h6"></path>
                                </svg>
                                <span class="text-lg">Atualizado</span>
                            </div>
                        </a>

                        <!-- Card de Celas com link -->
                        <a href="{{ route('celas.index') }}" class="bg-black text-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:translate-y-2">
                            <h3 class="text-xl font-semibold mb-4">Total de Celas</h3>
                            <p class="text-5xl font-extrabold">{{ $quantidadeCelas }}</p>
                            <div class="mt-6 flex items-center space-x-2 text-white-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18M3 18h18"></path>
                                </svg>
                                <span class="text-lg">Atualizado</span>
                            </div>
                        </a>

                        <!-- Card de Visitas com link -->
                        <a href="{{ route('visitas.index') }}" class="bg-white text-black p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:translate-y-2">
                            <h3 class="text-xl font-semibold mb-4">Total de Visitas</h3>
                            <p class="text-5xl font-extrabold">{{ $quantidadeVisitas }}</p>
                            <div class="mt-6 flex items-center space-x-2 text-white-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4 4m0 0l4-4m-4 4l-4 4m4-4V6m-4 4V6m-6 12V9m6 3h6a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h6"></path>
                                </svg>
                                <span class="text-lg">Excelente</span>
                            </div>
                        </a>

                        <!-- Card de Visitantes com link -->
                        <a href="{{ route('visitantes.index') }}" class="bg-black text-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:translate-y-2">
                            <h3 class="text-xl font-semibold mb-4">Visitantes</h3>
                            <p class="text-5xl font-extrabold">{{ $quantidadeVisitantes }}</p>
                            <div class="mt-6 flex items-center space-x-2 text-white-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3h8a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-8m-4 0H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8"></path>
                                </svg>
                                <span class="text-lg">Excelente</span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>

</body>

</html>
