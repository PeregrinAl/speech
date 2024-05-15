<div>
    <x-button wire:click="open_modal()">{{ __('Добавить сценарий') }}</x-button>


    <x-dialog-modal x-cloak wire:model="showModal">
        <x-slot name="title">Добавление сценария</x-slot>
        <x-slot name="content">

            <div>
                <x-label for="time_available" value="{{ __('Ограничение по времени') }}" />
                <x-input wire:model="time_available" id="time_available" class="block mt-1 w-full p-3" type="time_available"
                    name="time_available" required autofocus autocomplete="time_available" />
            </div>
            <div>
                <x-label for="is_training" class="py-2" value="{{ __('Тренировочный сценарий?') }}" />
                <x-input wire:model="is_training" id="is_training" class="block mt-1 p-3" type="checkbox"
                    name="is_training" required autocomplete="is_training" value="1" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row justify-end gap-x-3">
                <x-button wire:click="cancel" class="!bg-rose-900">{{ __('Отмена') }}</x-button>
                <x-button wire:click="add_scenario">{{ __('forms.add') }}</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>