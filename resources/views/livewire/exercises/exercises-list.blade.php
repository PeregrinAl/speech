<div class="column-2">

    <ul>
        @foreach($exercises as $exercise) 
            <li class="p-3 m-3 rounded-lg border-2 border-gray-300 hover:border-indigo-300">
                <div class="flex flex-col">
                    <div class="flex flex-row grid-cols-3 ">
                        <div class="px-2 text-2xl">{{ $exercise->name }}</div>
                        <div class="grow px-2">
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
                            {{ $exercise->type->name }}
                        </div>
                        <div class="px-2 mx-2 bg-yellow-100 rounded-lg self-auto md:self-start">
                            тэг
                        </div>
                    </div>

                </div>
                <!-- <div class="flex flex-row">
                            <div >

                            </div>
                            <div class="grow px-2">
                            </div>
                            <div>
                                <button class="px-5">
                                    💖
                                </button>
                            </div>
                        </div> -->
            </li>
        @endforeach
    </ul>
</div>