<div>
    <ul>
        @foreach($exercises as $exercise)         
            <li>
                <div class="flex flex-row">
                    <a class="grow p-3 m-3 rounded-lg border-2 border-dashed border-gray-100 hover:border-indigo-300"
                        href="{{ route('exercise', ['id' =>  $exercise->exercise->id]) }}">
                        <div class="flex flex-col">
                            <div class="grow px-2 text-2xl">{{ $exercise->exercise->name }}</div>
                        </div>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
