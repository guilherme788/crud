<x-guest-layout>
    <!-- Container de fundo para toda a tela -->

        <!-- Formulário Centralizado -->
        <div class="flex justify-center items-center min-h-screen bg-black bg-opacity-60">
            <div class="w-full max-w-md bg-gray-800 bg-opacity-80 p-8 rounded-lg shadow-lg mx-auto">
                <h2 class="text-3xl text-white font-semibold text-center mb-6">Registrar-se</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nome')" class="text-white text-sm" />
                        <x-text-input id="name" class="block mt-1 w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-xs" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('E-mail')" class="text-white text-sm" />
                        <x-text-input id="email" class="block mt-1 w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Senha')" class="text-white text-sm" />
                        <x-text-input id="password" class="block mt-1 w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" class="text-white text-sm" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-xs" />
                    </div>

                    <!-- Links e botão -->
                    <div class="flex justify-between items-center mt-4">
                        <!-- Link para login -->
                        <a class="text-white hover:text-indigo-400 text-sm" href="{{ route('login') }}">
                            {{ __('Já possui uma conta? Entre') }}
                        </a>

                        <x-primary-button class="w-full px-6 py-2 text-sm bg-indigo-600 hover:bg-green-500 focus:ring-indigo-500 transition duration-200 ease-in-out">
                            {{ __('Registrar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
