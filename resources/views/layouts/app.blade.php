<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Presos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJv+M9pDHT9j9hPkQeR8eF5Y6OZ1bt7xXReHgfe6gtzzYaY0O5D9g4EuyVFM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black"> <!-- Cor de fundo alterada para bg-black -->

    <!-- Navbar -->
    <nav class="bg-black text-white shadow-md fixed w-full z-10 top-0">
        <div class="flex justify-between items-center p-4">
            <h2 class="text-lg font-semibold text-white">Delegacia</h2>
            <button class="lg:hidden text-white" x-data="{}" @click="$store.sidebar.toggle">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-black text-white fixed top-0 left-0 shadow-xl">
            <div class="px-6 py-4 border-b border-gray-800">
                <h2 class="text-lg font-semibold text-center text-yellow-400">Delegacia</h2>
            </div>
            <div class="space-y-6 mt-8">
                <!-- Links da sidebar -->
                <a href="{{ route('dashboard') }}" class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-gray-700 hover:text-white-500 rounded-md transition duration-200 ease-in-out">
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

        <!-- Conteúdo Principal com Linha Separadora -->
        <div class="flex-1 ml-64 p-6 overflow-y-auto border-l border-gray-400">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                <!-- Conteúdo do Dashboard -->
            </div>

            @yield('content') <!-- Conteúdo do layout -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
