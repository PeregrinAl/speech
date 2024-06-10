<div>
    <div class="flex">
        <x-input class="grow py-2 px-3 m-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300 " type="text"
            wire:model.live="search" placeholder="Введите запрос" />
        <x-button class="!m-3 !px-20" wire:click="performSearch">Поиск</x-button>
    </div>

    <ul>
        @foreach($exercises as $exercise)         
            <li>
                <div class="flex flex-row">
                    <a class="grow p-3 m-3 rounded-lg border-2 border-dashed border-gray-100 hover:border-indigo-300"
                        href="{{ route('exercise', ['id' => $exercise->id]) }}">
                        <div class="flex flex-col">
                            <div class="grow px-2 text-2xl">{{ $exercise->name }}</div>

                            <div class="flex flex-row pt-6">
                                <div class="p-2 text-blue-500 me-2 mb-2 text-sm font-bold border border-2 border-blue-500 rounded-lg">
                                    @if ($exercise->type)
                                        {{ $exercise->type->name }}
                                    @endif
                                </div>
                                <div class="flex flex-row">
                                    @foreach($exercise->diagnoses as $diagnosis)
                                        <div class="p-2 text-green-500 me-2 mb-2 text-sm font-bold border border-2 border-green-500 rounded-lg">
                                            {{ $diagnosis->name }}
                                        </div>
                                    @endforeach           
                                </div>

                            </div>

                        </div>
                    </a>
                    <div>
                        <button wire:click='add_into_scenario({{$exercise->id}})' class=" p-3 m-3  text-2xl">
                            ➕
                        </button>
                        <button class="px-5 text-2xl">
                            💖
                        </button>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>