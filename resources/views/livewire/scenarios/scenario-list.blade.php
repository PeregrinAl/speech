@php

    $cur_user = Auth::user();

@endphp
<div>
    <ul>
        @foreach($scenarios as $scenario)
            <div>
                <li class="">
                    <div class="flex flex-row">


                        @if($cur_user->role == 'patient')
                            <a href="{{ route('scenario', ['id' => $scenario->id]) }}" class="grow p-3 m-3 rounded-lg border-2 border-gray-100 hover:border-indigo-300 border-dashed">
                                <div>
                                    {{ $scenario->name }}
                                </div>
                            </a>
                        @else
                            <a href="{{ route('scenario', ['id' => $scenario->id]) }}"
                                class="flex justify-center items-center px-2">
                                ▶️
                            </a>
                            <a class="grow p-3 m-3 rounded-lg border-2 border-gray-100 hover:border-indigo-300 border-dashed"
                                href="{{ route('scenario-config', ['id' => $scenario->id]) }}">
                                <div>
                                    {{ $scenario->name }}
                                </div>
                            </a>
                        @endif
                        <!-- <button class="px-5" wire:click="edit_scenario({{ $scenario->id }})">
                                        ✏️
                                    </button> -->

                        @if($cur_user->role != 'patient')
                            <button class="px-5"
                                onclick="confirm('Вы точно хотите удалить сценарий?') || event.stopImmediatePropagation()"
                                wire:click="delete({{ $scenario->id }})"">
                                                        ❌</button>
                        @else
                        @endif
                            </div>
                        </li>
                    </div>
        @endforeach
    </ul>
</div>