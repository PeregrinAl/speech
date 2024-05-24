<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Конфигурация упражнения: звук') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl p-6 sm:rounded-lg">


                <!-- текст задания -->
                <x-label value="{{ __('Текст задания') }}" />
                <textarea class="flex w-full my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300"
                    placeholder=" ">
                </textarea>


                <!-- озвучка задания -->
                <x-label value="{{ __('Озвучка задания') }}" />
                <input type="file" accept="audio/*" class="w-full text-sm text-grey-500
            file:py-2 file:my-3 file:px-8
            file:rounded-lg file:border-0
            file:text-md file:text-white
            file:bg-gray-700
            hover:file:cursor-pointer hover:file:opacity-80" />


                <!-- озвучка звука -->
                <x-label value="{{ __('Озвучка звука/слога/слова для повторения') }}" />
                <input type="file" accept="audio/*" class="w-full text-sm text-grey-500
            file:py-2 file:my-3 file:px-8
            file:rounded-lg file:border-0
            file:text-md file:text-white
            file:bg-gray-700
            hover:file:cursor-pointer hover:file:opacity-80" />

                <!-- сохранение -->
                <x-button>{{ __('Сохранить') }}</x-button>


            </div>
        </div>
    </div>
</x-app-layout>