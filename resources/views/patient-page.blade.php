@php
    $scenarios = $patient->home_scenarios;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('О пациенте') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid grid-cols-3 gap-4 m-3 p-3 ">
                <div class="col-span-2 rounded-lg border-2 border-gray-100">
                    <div class="m-5">
                        <h2 class="text-xl font-bold">{{ $patient->name }}</h2>
                        @if ($patient->date_of_birth)

                            <h2 class="text-xl">возраст:
                                {{ $patient->date_of_birth?->diffInYears() ?? '' }}
                            </h2>
                        @else
                            <small>(не указана дата рождения)</small>
                        @endif
                    </div>
                </div>
                <div class="rounded-lg border-2 border-gray-100 ">
                    <div class="m-5 flex flex-col">
                        <x-label value="{{ __('Заметка') }}" />
                        <textarea name="description"
                            class="my-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300"></textarea>
                        <x-button class="justify-center">Сохранить</x-button>
                    </div>
                </div>
                <div class="col-span-2 rounded-lg border-2 border-gray-100">
                    <div class="m-5">
                        <x-label value="{{ __('Назначенные сценарии') }}" />
                        <!-- @foreach ($scenarios as $scenario)
                            <div class="p-2 my-2 rounded-lg border-2 border-gray-300">
                                <span>{{$scenario->name}}</span>
                            </div>
                        @endforeach -->
                        @livewire('patients.home-scenario-list', ['patient_id' => $patient->id])
                    </div>
                </div>
                <div class="rounded-lg border-2 border-gray-100 ">
                    <div class="m-5 flex flex-col">
                        <x-label value="{{ __('Статистика') }}" />

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>