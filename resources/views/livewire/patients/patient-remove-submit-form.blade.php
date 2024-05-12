<div>

    <x-button wire:click="open_modal()">{{ __('Добавить пациента') }}</x-button>


    <x-dialog-modal x-cloak wire:model="showModal">
        <x-slot name="title">Удаление пациента</x-slot>
        <x-slot name="content">

            <div>
                <x-label value="{{ __('Вы действительно хотите удалить пациента?') }}" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row justify-end gap-x-3">
                <x-button wire:click="cancel" class="!bg-rose-900">{{ __('Отмена') }}</x-button>
                <x-button wire:click="delete_patient">{{ __('forms.add') }}</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>


</div>
