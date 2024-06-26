<div class="col-span-1" x-data x-sortable x-on:sorted="$wire.updateOrder($event.detail)">
    @foreach ($exercises as $exercise)
        <div 
            class="p-3 m-3 rounded-lg border-2 border-gray-100 hover:border-indigo-300"
            x-sortable-item="{{ $exercise->id }}">
            <div class="flex flex-row grid-cols-3 ">
                <div class="px-2 text-2xl">{{ $exercise->exercise->name }}</div>
                <div class="grow px-2">
                </div>
                <div>
                    <button wire:click="delete_exercise_from_scenario({{ $exercise->id }})" class="px-5 text-2xl">
                        ❌
                    </button>
                </div>
            </div>
            <div>
                <p class="text-white">a</p>
            </div>
            <div class="flex flex-row">
                <div class="p-2 text-blue-500 me-2 mb-2 text-sm font-bold border border-2 border-blue-500 rounded-lg">
                    @if ($exercise->exercise->type)
                        {{ $exercise->exercise->type->name }}
                    @endif
                </div>

                @if($exercise->exercise->diagnoses)
                @foreach($exercise->exercise->diagnoses as $diagnosis)
                    <div>
                        <div class="p-2 text-green-500 me-2 mb-2 text-sm font-bold border border-2 border-green-500 rounded-lg">
                            {{ $diagnosis->name }}
                        </div>

                    </div>
                @endforeach
                @endif
            </div>
        </div>
    @endforeach
</div>