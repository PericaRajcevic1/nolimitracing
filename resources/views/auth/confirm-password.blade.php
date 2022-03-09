<x-guest-layout>
    <x-jet-authentication-card>
    <x-slot name="logo">
        
    </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Ovo je sigurno područje stranice. Prije nastavka potvrdite svoju lozinku.') }}
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="flex items-center justify-start pb-4">
                    <a href="javascript:history.back()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                        Nazad</a>
            </div>
            <div>
                <x-jet-label for="password" value="{{ __('Lozinka') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Potvrdi') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
