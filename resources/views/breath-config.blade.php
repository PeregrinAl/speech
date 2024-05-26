<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Конфигурация упражнения: дыхание') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl p-6 sm:rounded-lg">
                
            <form method="POST" action="{{ route('save.exercise.breath') }}" enctype="multipart/form-data">
                    @csrf

                <!-- название задания -->
                <x-label value="{{ __('Название задания') }}" />
                <x-input name="name"
                    class="flex w-full my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300" />

                <!-- текст задания -->
                <x-label value="{{ __('Текст задания') }}" />
                <textarea name="description" class="flex w-full my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300"></textarea>

                <!-- озвучка задания -->
                <x-label value="{{ __('Озвучка задания') }}" />
                <input name="task_voiceover_file" type="file" accept="audio/*" class="w-full text-sm text-grey-500
            file:py-2 file:my-3 file:px-8
            file:rounded-lg file:border-0
            file:text-md file:text-white
            file:bg-gray-700
            hover:file:cursor-pointer hover:file:opacity-80" />

                <!-- вдох -->
                <x-label value="{{ __('Вдох (сек)') }}" />
                <x-input name="inhale"
                    class="flex my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300" />

                <!-- пауза -->
                <x-label value="{{ __('Пауза (сек)') }}" />
                <x-input name="pause"
                    class="flex my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300" />

                <!-- выдох -->
                <x-label value="{{ __('Выдох (сек)') }}" />
                <x-input name="exhalation"
                    class="flex my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300" />

                <!-- сохранение -->
                <x-button type="submit">{{ __('Сохранить') }}</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>