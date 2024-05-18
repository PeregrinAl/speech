<div class="column-2">

    <ul>
    @foreach($exercises as $exercise) 
        <li class="my-3 py-3 rounded-lg border border-gray-300">
            <div class="flex flex-row">
                <div class="px-2">
                    {{ $exercise->name }}
                </div>
                <div class="grow px-2">
                    <!-- пустота -->
                </div>
                <div>
                    <button class="px-5">
                    💖
                    </button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
