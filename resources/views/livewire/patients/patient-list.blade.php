<div class="column-2">
    <ul>
    @foreach($patients as $patient)
        <li class="my-3 p-3 rounded-md border border-gray-300">
            <div class="flex flex-row">
                <div class="px-2">
                    {{ $patient->name }}
                    {{ $patient->surname }}
                </div>
                <div class="grow px-2">
                    <Возраст>
                </div>
                <div>
                    <button class="px-5">
                    ➕
                    </button>
                    <button class="px-5">
                    ❌
                    </button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>