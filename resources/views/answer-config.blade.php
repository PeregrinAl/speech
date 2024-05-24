<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Конфигурация упражнения: тест') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl p-6 sm:rounded-lg">
                {{--<x-welcome />--}}
                <x-label value="{{ __('Текст упражнения') }}" />
                <textarea class="flex w-full my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300" placeholder=" "></textarea>
                <x-button>{{ __('Сохранить') }}</x-button>
            </div>
        </div>
    </div>
</x-app-layout>