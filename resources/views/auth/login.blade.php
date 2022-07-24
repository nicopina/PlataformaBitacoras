<x-guest-layout>

    <x-jet-authentication-card>
    
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex items-center justify-center mt-5">
                <h1 class="text-white font-bold mb-4 text-3xl">Bitácoras C&C</h1>
            </div>
            <div>
                <x-jet-label class="text-white font-bold mt-2" for="login" value="{{ __('Usuario') }}" />
                <x-jet-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" autocomplete="off" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label class="text-white font-bold" for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <div class="flex items-center justify-center mt-6">
                

                <x-jet-button class="ml-4 bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
