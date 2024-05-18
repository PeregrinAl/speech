<div>
    @if(Auth::user()->role=='superadmin')   
    <x-button wire:click="open_modal()">{{ __('Добавить упражнение') }}</x-button>
    @endif

    <x-dialog-modal x-cloak wire:model="showModal">
        <x-slot name="title">Добавление упражнения</x-slot>
        <x-slot name="content">

        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row justify-end gap-x-3">
                <x-button wire:click="cancel" class="!bg-rose-900">{{ __('Отмена') }}</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
