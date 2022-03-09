<x-guest-layout>
    <x-jet-authentication-card>
    <x-slot name="logo">
        
    </x-slot>
        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('Potvrdite pristup svom računu unošenjem koda za provjeru autentičnosti koji ste dobili od vaše aplikacije za autentifikaciju.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                {{ __('Potvrdite pristup svom računu unosom jednog od svojih kodova za hitni oporavak.') }}
            </div>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf
                <div class="flex items-center justify-start pb-4">
                    <a href="javascript:history.back()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                        Nazad</a>
            </div>
                <div class="mt-4" x-show="! recovery">
                    <x-jet-label for="code" value="{{ __('Kod') }}" />
                    <x-jet-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-show="recovery">
                    <x-jet-label for="recovery_code" value="{{ __('Kod za oporavak') }}" />
                    <x-jet-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Iskoristi kod za oporavak') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Iskoristi autentifikacijski kod') }}
                    </button>

                    <x-jet-button class="ml-4">
                        {{ __('Prijavi se') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
