<div class="column-2">

    <ul>
    @foreach($scenarios as $scenario)
    <a class="grow" href="{{ route('scenario-config', ['id' => $scenario->id]) }}">
        <li class="p-3 m-3 rounded-lg border-2 border-gray-100 hover:border-indigo-300">
            <div class="flex flex-row">
                <div class="px-2">
                    {{ $scenario->name }}
                    <small> ({{ $scenario->is_training? 'тренировочный' : 'зачетный' }})</small>
                </div>
                <div class="grow px-2">
                    <!-- <Пробел> -->
                </div>
                <div></a>
                <button class="px-5">
                    ⚙️
                    </button>
                    <button class="px-5" wire:click="edit_scenario({{ $scenario->id }})">
                    ✏️
                    </button>
                    <button class="px-5" onclick="confirm('Вы точно хотите удалить сценарий?') || event.stopImmediatePropagation()" wire:click="delete({{ $scenario->id }})"">
                    ❌
                    </button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
