<x-guest-layout>
    <x-jet-authentication-card>
    <x-slot name="logo">
        
    </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Hvala što ste se prijavili! Prije početka, možete li potvrditi svoju adresu e-pošte klikom na vezu koju smo vam upravo poslali? Ako niste primili e-mail, rado ćemo vam poslati još jedan.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Nova poveznica za potvrdu poslana je na adresu e-pošte koju ste naveli prilikom registracije.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="flex items-center justify-start pb-4">
                    <a href="javascript:history.back()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                        Nazad</a>
            </div>
                <div>
                    <x-jet-button type="submit">
                        {{ __('Ponovno pošalji e-mail za potvrdu') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Odjavi se') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
