<div>
    <!-- название задания -->
    <x-label value="{{ __('Название задания') }}" />
    <x-input wire:model="name" class="flex w-full my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300" />

    <!-- текст задания -->
    <x-label value="{{ __('Текст упражнения') }}" />
    <textarea wire:model="description"
        class="flex w-full my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300"></textarea>

    <!-- озвучка задания -->
    <x-label value="{{ __('Озвучка задания') }}" />
    <input wire:model="task_voiceover_file" type="file" accept="audio/*" class="w-full text-sm text-grey-500
            file:py-2 file:my-3 file:px-8
            file:rounded-lg file:border-0
            file:text-md file:text-white
            file:bg-gray-700
            hover:file:cursor-pointer hover:file:opacity-80" />

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
            <x-input type="text" class="w-full" wire:model="rows.{{ $index }}.answer" />

            <!-- картинка к ответу -->
            <input name="answer_picture" type="file" wire:model="rows.{{ $index }}.file1" accept="image/*" class="text-sm text-grey-500
                        file:py-2 file:my-2 file:px-5
                        file:rounded-lg file:border-0
                        file:text-md file:text-white
                        file:bg-gray-700
                        hover:file:cursor-pointer hover:file:opacity-80 w-full" />

            <!-- озвучка ответа -->
            <input name="answer_audio" type="file" wire:model="rows.{{ $index }}.file2" accept="audio/*" class="text-sm text-grey-500
                        file:py-2 file:my-2 file:px-5
                        file:rounded-lg file:border-0
                        file:text-md file:text-white
                        file:bg-gray-700
                        hover:file:cursor-pointer hover:file:opacity-80 w-full " />

            <!-- верный ответ -->
            <input name="{{ $index }}" type="checkbox" value="true" id="{{$index}}" wire:model="rows.{{ $index }}.radio">

            <!-- удаление варианта ответа -->
            <x-button class="my-3 " wire:click="removeRow({{ $index }})">{{ __('Удалить') }}</x-button>
        </div>
    @endforeach
    <x-button class="my-2 place-items-start" wire:click="addRow">{{ __('Добавить') }}</x-button>
    <div>
        <x-button wire:click="add_exercise">{{ __('Сохранить') }}</x-button>
    </div>
</div>