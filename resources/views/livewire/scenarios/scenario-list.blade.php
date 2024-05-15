<div class="column-2">

    <ul>
    @foreach($scenarios as $scenario)
        <li class="my-3 p-3 rounded-lg border border-gray-300">
            <div class="flex flex-row">
                <div class="px-2">
                    {{ $scenario->is_training? 'тренировочный' : 'зачетный' }}
                </div>
                <div class="grow px-2">
                    <!-- <Пробел> -->
                </div>
                <div>
                    <button class="px-5">
                    💌
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
