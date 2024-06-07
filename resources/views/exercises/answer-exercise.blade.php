<script>
    function play() {
        let audio = document.getElementById('audioPlayer');
        audio.play();
    };
</script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Упражнение: тест') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="font-mono text-xl font-bold text-center p-6 my-6">
                    <p class="text-sky-800">{{ $exercise->description }}<button onclick="play()">🔊</button></p>
                    <audio id="audioPlayer" src="{{$exercise->task_voiceover_path}}" class="invisible"></audio>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>