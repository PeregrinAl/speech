<div class="column-2">

    <ul>
    @foreach($patients as $patient)
        <li class="p-3 m-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300">
            <div class="flex flex-row">
                <div class="px-2">
                    {{ $patient->name }}
                    {{ $patient->surname }},
                    
                    @if ($patient->date_of_birth)
                    
                    <span>{{ $patient->date_of_birth?->format('d.m.Y') ?? '' }}</span>  <span>г.р.</span> <small>(возраст: 
                    {{ $patient->date_of_birth?->diffInYears() ?? '' }})</small>
                    @else
                     <small>(не указана дата рождения)</small>
                    @endif
                </div>
                <div class="grow px-2">
                    <!-- <Возраст> -->
                </div>
                <div>
                    <button class="px-5" wire:click="add_scenario({{ $patient }})">
                    ➕
                    </button>
                    <button class="px-5" onclick="confirm('Вы точно хотите удалить пациента?') || event.stopImmediatePropagation()" wire:click="delete({{ $patient->id }})"">
                    ❌
                    </button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>