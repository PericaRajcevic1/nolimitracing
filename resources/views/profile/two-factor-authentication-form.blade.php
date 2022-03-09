<x-jet-action-section>
    <x-slot name="title">
        {{ __('Two Factor Authentikacija') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Dodajte dodatnu sigurnost svom računu pomoću provjere autentičnosti s dva faktora.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                {{ __('Omogućili ste provjeru autentičnosti s dva faktora.') }}
            @else
                {{ __('Niste omogućili dvofaktorsku provjeru autentičnosti.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('Kada je omogućena provjera autentičnosti s dva faktora, tijekom provjere autentičnosti bit ćete upitani za siguran, nasumični token. Ovaj token možete preuzeti iz aplikacije Google Authenticator na svom telefonu.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Dvofaktorska provjera autentičnosti sada je omogućena. Skenirajte sljedeći QR kod pomoću aplikacije za autentifikaciju vašeg telefona.') }}
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Pohranite ove kodove za oporavak u sigurnom upravitelju lozinki. Mogu se koristiti za oporavak pristupa vašem računu ako se izgubi vaš uređaj za autentifikaciju s dva faktora.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('Omogući') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Regenerirajte kodove za oporavak') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Prikaži kodove za oporavak') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        {{ __('Onemogući') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
