<x-jet-action-section>
    <x-slot name="title">
        {{ __('Izbriši račun') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Trajno izbrišite svoj račun.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Kada se vaš račun izbriše, svi njegovi resursi i podaci bit će trajno izbrisani. Prije brisanja računa preuzmite sve podatke ili informacije koje želite zadržati.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Izbriši račun') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Izbriši račun') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Jeste li sigurni da želite izbrisati svoj račun? Kada se vaš račun izbriše, svi njegovi resursi i podaci bit će trajno izbrisani. Unesite svoju lozinku kako biste potvrdili da želite trajno izbrisati svoj račun.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Odustani') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Izbriši račun') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
