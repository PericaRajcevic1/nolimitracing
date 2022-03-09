<x-guest-layout>
    <x-jet-authentication-card>
    <x-slot name="logo">
        
    </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Zaboravili ste zaporku? Nema problema. Samo nam napišite svoju adresu e-pošte i poslat ćemo vam e-poštom vezu za poništavanje lozinke koja će vam omogućiti da odaberete novu.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="flex items-center justify-start pb-4">
                    <a href="javascript:history.back()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                        Nazad</a>
            </div>
            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Veza za poništavanje lozinke e-pošte') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
