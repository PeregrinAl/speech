<div>
    <x-button class="p-3 m-3" wire:click="open_modal()">{{ __('Добавить сценарий') }}</x-button>


    <x-dialog-modal x-cloak wire:model="showModal">
        <x-slot name="title">Добавление сценария</x-slot>
        <x-slot name="content">
            <div>
                <x-label for="name" value="{{ __('scenario.name') }}" />
                <x-input wire:model="name" id="name" class="block mt-1 w-full p-3" type="name" name="name" required
                    autofocus autocomplete="name" />

            </div>
            <div>
                <x-label for="time_available" class="py-2" value="{{ __('scenario.time_available') }}" />
                <x-input wire:model="time_available" id="time_available" class="block mt-1 w-full p-3"
                    type="time_available" name="time_available" required autofocus autocomplete="time_available" />
            </div>

            <div>
                <x-label for="is_training" class="py-2" value="{{ __('scenario.is_training') }}" />
                <x-input wire:model="is_training" id="is_training" class="block mt-1 p-3" type="checkbox"
                    name="is_training" required autocomplete="is_training" value="1" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row justify-end gap-x-3">
                <x-button wire:click="cancel" class="!bg-rose-900">{{ __('forms.cancel') }}</x-button>
                <x-button wire:click="add_scenario">{{ __('forms.add') }}</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>