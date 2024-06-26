<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $scenario->name }}{{__(': кофигурация')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-2">
                    <div>
                        @livewire('Scenarios.scenario-exercises-list', ['scenario_id' => Route::current()->parameter('id')])
                    </div>
                    <div>
                        <container class="max-h-10">
                            @livewire('Exercises.exercises-list', ['scenario_id' => $scenario->id])
                        </container>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>