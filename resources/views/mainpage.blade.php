@php
    use App\Models\User;

    $cur_user = Auth::user();
    $scenarios = User::where('id', $cur_user->id)->first()->home_scenarios;

@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-mono text-xl text-gray-800 leading-tight">
            {{ __('Привет! 🌞') }}
        </h2>
    </x-slot>

    <div class="py-12 rounded-lg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">

                @if($cur_user->role == 'patient' && (is_array($scenarios) || is_object($scenarios)))
                    <p class="text-xl p-5 text-sky-600 font-mono">Вам назначено домашнее задание!</p>
                    <ul>
                        @foreach($scenarios as $scenario)
                            <li class="p-3 m-3 rounded-lg border-4 border-gray-300 hover:border-indigo-300">
                                <div class="flex flex-row">
                                    <div class="px-2  font-mono">
                                        {{ $scenario->name }} 🪄
                                        <small> ({{ $scenario->is_training ? 'тренировочный' : 'зачетный' }})</small>
                                    </div>
                                    <div class="grow px-2">
                                        <!-- <Пробел> -->
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="p-6 flex grow">
                        <button class="p-5 text-white bg-indigo-700 rounded-lg grow transition ease-in-out hover:-translate-y-1 hover:scale-101 hover:bg-indigo-900 duration-300">
                            Диктофон для записи звуков и упражнений
                        </button>
                    </div>
                    <!-- <div class="p-6 flex grow">
                        <button class="p-5 text-white bg-indigo-700 rounded-lg grow transition ease-in-out  hover:-translate-y-1 hover:scale-101 hover:bg-indigo-900 duration-300">
                            Интеллектуальная первичная диагностика
                        </button>
                    </div> -->
                @endif
            </div>
        </div>
    </div>
</x-app-layout>