<div class="">
    <ul>
        @foreach($patients as $patient)
        <li class=""> 
            <div class="flex flex-row">
                <a class="grow p-3 m-3 rounded-lg border-2 border-dashed border-gray-100 hover:border-indigo-300" href="{{ route('patient-page', ['id' => $patient->id]) }}">
                    <div class="px-2">
                        {{ $patient->name }}
                        {{ $patient->surname }},

                        @if ($patient->date_of_birth)

                            <span>{{ $patient->date_of_birth?->format('d.m.Y') ?? '' }}</span> <span>г.р.</span>
                            <small>(возраст:
                                {{ $patient->date_of_birth?->diffInYears() ?? '' }})</small>
                        @else
                            <small>(не указана дата рождения)</small>
                        @endif
                    </div>
                </a>
            <div class="py-3 my-3">
                <button class="px-2" wire:click="add_scenario({{ $patient }})">
                    ➕
                </button>
                <button class="px-2"
                    onclick="confirm('Вы точно хотите удалить пациента?') || event.stopImmediatePropagation()"
                    wire:click="delete({{ $patient->id }})"">
                    ❌
                </button>
            </div>
        </li>
        @endforeach
    </ul>
</div>