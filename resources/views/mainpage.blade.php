@php
    use App\Models\User;

    $cur_user = Auth::user();
    $scenarios = User::where('id', $cur_user->id)->first()->home_scenarios;

@endphp
<x-app-layout>
    <x-slot name="header">
        @if($cur_user->role == 'patient')
        <h2 class="font-semibold font-mono text-xl text-gray-800 leading-tight">
            {{ __('Привет! 🌞 Твой ID:')  }} {{strval($cur_user->id)}}
        </h2>
        @else
        <h2 class="font-semibold font-mono text-xl text-gray-800 leading-tight">
            {{ __('Привет! 🌞')  }}
        </h2>
        @endif
    </x-slot>

    <div class="py-12 rounded-lg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">

                @if($cur_user->role == 'patient' && (is_array($scenarios) || is_object($scenarios)))
                    <p class="text-xl p-5 text-sky-600 font-mono">Вам назначено домашнее задание!</p>
                    <ul>
                        @foreach($scenarios as $scenario)
                            <div class="flex flex-row">
                                <button class="px-2">
                                    ▶️
                                </button>
                                <a class="grow p-3 m-3 rounded-lg border-2 border-gray-100 hover:border-indigo-300 border-dashed"
                                    href="{{ route('scenario-config', ['id' => $scenario->id]) }}">
                                    <div>

                                        {{ $scenario->name }}
                                        <small> ({{ $scenario->is_training ? 'тренировочный' : 'зачетный' }})</small>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </ul>
                @else

                @endif
            </div>
        </div>
    </div>
</x-app-layout>