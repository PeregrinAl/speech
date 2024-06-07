<script>
    let interval;
    function readText() {
        clearInterval(interval);
        let text = document.getElementById('toRead').innerText;
        let speed = document.getElementById('speedSelect').value;
        
        let i = 0;
        interval = setInterval(function () {
            if (i <= text.length) {
                document.getElementById('toRead').innerHTML = '<span style="color:#228B22">' + text.substring(0, i) + '</span>' + text.substring(i);
                i++;
            } else {
                clearInterval(interval);
            }
        }, speed);
    };
</script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Упражнение: читаем текст') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="font-mono text-4xl font-bold text-center p-6 my-6">
                    <p class="text-sky-800">{{ $exercise->description }}<button>🔊</button></p>
                </div>
                <div class="font-mono text-5xl text-center p-6 my-6">
                    <p class="" id="toRead">
                        {{ $exercise->text }}
                    </p>
                </div>
                <div>
                    <select id="speedSelect">
                        <option value="10">10</option>
                        <option value="25">4</option>
                        <option value="50">2</option>
                        <option selected value="100">1</option>
                        <option value="200">0.5</option>
                        <option value="400">0.25</option>
                        <option value="1000">0.1</option>
                    </select>
                </div>

                <div class="flex justify-center m-6 p-6">
                    <x-button id="startButton" onclick="readText()">начать!</x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>