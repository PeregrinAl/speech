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

                    <p class="text-sky-800">{{ $exercise->description }}<button id="audioButton">🔊</button></p>

                    <figure>
                        <audio class="invisible" id="audioPlayer" controls
                            src="{{Storage::url($exercise->task_voiceover_path)}}"></audio>
                    </figure>

                </div>

                @livewire('exercises.answers.answers-list', ['exercise_id' => $exercise->id])

            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('audioButton').addEventListener('click', function () { play(); });
    
    function play() {

        var audioPlayer = document.getElementById('audioPlayer');

        audioPlayer.play(); // Воспроизводим аудио

    };

</script>