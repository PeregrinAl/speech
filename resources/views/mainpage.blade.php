<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12 rounded-lg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                {{--<x-welcome />--}}

                *тут основной контент приложения*
            </div>
        </div>
    </div>
</x-app-layout>
