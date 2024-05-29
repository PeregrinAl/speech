<div>
    <x-dialog-modal x-cloak wire:model="showModal">
        <x-slot name="title">Назначение сценария</x-slot>
        <x-slot name="content">

            <div>
                <x-label for="scenario_id" value="{{ __('Выберите сценарий') }}" />
                <select wire:model="selected_scenario" class="block mt-1 w-full p-3 rounded-md">
                    @foreach($scenarios as $scenario)
                        <option value="{{ $scenario->id }}">{{ $scenario->name }}</option>
                    @endforeach
                </select>
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row justify-end gap-x-3">
            <x-button wire:click="cancel" class="!bg-rose-900">{{ __('Отмена') }}</x-button>
            <x-button wire:click="assignTask">{{ __('Назначить') }}</x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>