<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $scenario->name }}{{__(': выполнение')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <container class="max-h-10">
                        @livewire('Scenarios.scenario-compleeting-list', ['scenario_id' => Route::current()->parameter('id')])
                    </container>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>