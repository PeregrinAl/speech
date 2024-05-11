<div>

    <x-button wire:click="open_modal()">{{ __('Добавить пациента') }}</x-button>


    <x-dialog-modal x-cloak wire:model="showModal">
        <x-slot name="title">Добавление пациента</x-slot>
        <x-slot name="content">

            <div>
                <x-label for="patient_id" value="{{ __('forms.patient_id') }}" />
                <x-input wire:model="patient_id" id="patient_id" class="block mt-1 w-full p-3" type="patient_id" name="patient_id" required
                    autofocus autocomplete="patient_id" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row justify-end gap-x-3">
                <x-button wire:click="cancel" class="!bg-rose-900">{{ __('Отмена') }}</x-button>
                <x-button wire:click="add_patient">{{ __('forms.add') }}</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>


</div>