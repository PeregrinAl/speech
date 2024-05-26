<div>
    <!-- название задания -->
    <x-label value="{{ __('Название задания') }}" />
    <x-input name="name" class="flex w-full my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300" />

    <!-- текст задания -->
    <x-label value="{{ __('Текст упражнения') }}" />
    <textarea class="flex w-full my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300"></textarea>

    <!-- заголовки -->
    <div class="grid grid-cols-5 gap-4 place-items-start">
        <div><x-label value="{{ __('Ответ:') }}" /></div>
        <div><x-label value="{{ __('Картинка:') }}" /></div>
        <div><x-label value="{{ __('Озвучка ответа:') }}" /></div>
        <div><x-label value="{{ __('Ответ:') }}" /></div>
        <div><x-label value="{{ __('') }}" /></div>
    </div>

    <!-- строка варианта ответа -->
    @foreach($rows as $index => $row)
        <div class="grid grid-cols-5 gap-4 place-items-center">
            <!-- ответ -->
            <x-input type="text" class="w-full" wire:model="rows.{{ $index }}.text" />

            <!-- картинка к ответу -->
            <input type="file" wire:model="rows.{{ $index }}.file1" class="text-sm text-grey-500
                    file:py-2 file:my-2 file:px-5
                    file:rounded-lg file:border-0
                    file:text-md file:text-white
                    file:bg-gray-700
                    hover:file:cursor-pointer hover:file:opacity-80 w-full" />

            <!-- озвучка ответа -->
            <input type="file" wire:model="rows.{{ $index }}.file2" accept="audio/*" class="text-sm text-grey-500
                    file:py-2 file:my-2 file:px-5
                    file:rounded-lg file:border-0
                    file:text-md file:text-white
                    file:bg-gray-700
                    hover:file:cursor-pointer hover:file:opacity-80 w-full " />

            <!-- верный ответ -->
            <input type="radio" name="answer" value="option1" wire:model="rows.{{ $index }}.radio">

            <!-- удаление варианта ответа -->
            <x-button class="my-3 " wire:click="removeRow({{ $index }})">{{ __('Удалить') }}</x-button>
        </div>
    @endforeach

    <x-button class="my-2 place-items-start" wire:click="addRow">{{ __('Добавить') }}</x-button>
    <x-button>{{ __('Сохранить') }}</x-button>
</div>