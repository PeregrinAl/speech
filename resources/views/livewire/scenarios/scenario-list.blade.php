<div>
    <ul>
        @foreach($scenarios as $scenario)
            <div>
                <li class="">
                    <div class="flex flex-row">
                        <button class="px-2">
                            ▶️
                        </button>
                        <a class="grow p-3 m-3 rounded-lg border-2 border-gray-100 hover:border-indigo-300 border-dashed" href="{{ route('scenario-config', ['id' => $scenario->id]) }}">
                            <div>

                                {{ $scenario->name }}
                                <small> ({{ $scenario->is_training ? 'тренировочный' : 'зачетный' }})</small>
                            </div>
                        </a>
                        <button class="px-5" wire:click="edit_scenario({{ $scenario->id }})">
                            ✏️
                        </button>
                        <button class="px-5"
                            onclick="confirm('Вы точно хотите удалить сценарий?') || event.stopImmediatePropagation()"
                            wire:click="delete({{ $scenario->id }})"">
                            ❌
                        </button>
                    </div>
                </li>
            </div>
        @endforeach
    </ul>
</div>