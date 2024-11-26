<x-guest-layout>
    <link rel="stylesheet" href="css/login.css">

    <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Formulário de Login, fica sobre a imagem de fundo -->
        <div class="relative w-full max-w-md bg-gray-800 bg-opacity-90 p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl text-white font-semibold text-center mb-6">Entrar</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="space-y-4">
                    <!-- E-mail -->
                    <div>
                        <x-input-label for="email" :value="__('E-mail')" class="text-white text-sm" />
                        <x-text-input id="email" class="block mt-1 w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
                    </div>

                    <!-- Senha -->
                    <div>
                        <x-input-label for="password" :value="__('Senha')" class="text-white text-sm" />
                        <x-text-input id="password" class="block mt-1 w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
                    </div>
                </div>

                <!-- Lembrar-me -->
                <div class="flex items-center mb-4">
                    <label for="remember_me" class="inline-flex items-center text-white text-sm">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2">{{ __('Lembrar-me') }}</span>
                    </label>
                </div>

                <!-- Botão de Login -->
                <div class="flex justify-between items-center mt-4">
                    <x-primary-button class="w-full px-6 py-2 text-sm bg-indigo-600 hover:bg-green-500 focus:ring-indigo-500 transition duration-200 ease-in-out transform hover:scale-105">
                        {{ __('Entrar') }}
                    </x-primary-button>
                </div>

                <!-- Links -->
                <div class="flex justify-between mt-4 text-sm text-white">
                    <!-- Esqueci minha senha -->
                    @if (Route::has('password.request'))
                        <a class="text-white hover:text-indigo-400" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif

                    <!-- Link para Registrar -->
                    <a href="{{ route('register') }}" class="text-white hover:text-indigo-400">
                        {{ __('Ainda não tem uma conta? Registre-se') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
