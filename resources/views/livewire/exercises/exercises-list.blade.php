<div class="column-2 overflow-scroll ">
    <div class="flex">
        <x-input class="grow py-2 px-3 m-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300 " type="text"
            wire:model.live="search" placeholder="Введите запрос" />
        <x-button class="!m-3 !px-20" wire:click="performSearch">Поиск</x-button>
    </div>
    <ul>
        <div>
        @foreach($exercises as $exercise) 
        
            <li class="p-3 m-3 rounded-lg border-2 border-gray-100 hover:border-indigo-300">
                <div class="flex flex-col">
                    <div class="flex flex-row grid-cols-3 ">
                        <div class="px-2 text-2xl">{{ $exercise->name }}</div>
                        <div class="grow px-2">
                        </div>
                        <div>
                            <button wire:click='add_into_scenario({{$exercise->id}})' class="px-5 text-2xl">
                            ➕
                            </button>
                        </div>
                        <div>
                            <button class="px-5 text-2xl">
                                💖
                            </button>
                        </div>
                    </div>
                    <div>
                        <p class="text-white">a</p>
                    </div>
                    <div class="flex flex-row">
                        <div class="px-2 mx-2 bg-green-100 rounded-lg self-auto md:self-start">
                            @if ($exercise->type)
                                {{ $exercise->type->name }}
                            @endif
                        </div>

                        @foreach($exercise->diagnoses as $diagnosis)
                            <div>
                                <div class="px-2 mx-2 bg-yellow-100 rounded-lg self-auto md:self-start">
                                    {{ $diagnosis->name }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </li>
        @endforeach
        </div>
    </ul>
</div>