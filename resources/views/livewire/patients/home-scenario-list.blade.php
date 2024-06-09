<div>

    <ul>
        @foreach($scenarios as $scenario)
            <li class="grow">
                <div class="flex flex-row my-3 p-3 rounded-lg border-2 border-gray-100">
                            <div class="">
                                {{ $scenario->name }}
                                <small> ({{ $scenario->is_training ? 'тренировочный' : 'зачетный' }})</small>
                            </div>

                    <button class="px-5"
                        onclick="confirm('Вы точно хотите удалить сценарий?') || event.stopImmediatePropagation()"
                        wire:click="delete({{ $scenario->id }})"">
                        ❌
                    </button>
                </div>
                </li>
        @endforeach
    </ul>
</div>