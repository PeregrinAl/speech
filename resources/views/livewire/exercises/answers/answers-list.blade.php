<div class="flex flex-row justify-center">
    @foreach ($answers as $index => $answer)
        <div class="flex flex-col justify-center">
            <button id="sound-{{$index}}" class="text-white px-4 py-2 rounded mb-2">🔉</button>
            <div id="picture-{{$index}}"
                class="w-50 h-50 m-4 p-4 flex flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-100 hover:border-indigo-300">

                <figure>
                    <audio class="invisible" id="audioPlayer-{{$index}}" controls
                        src="{{Storage::url($answer->audio_path)}}"></audio>
                </figure>

                <p class="text-lg font-bold">{{$answer->answer}}</p>
                <p id="answer-{{$index}}" class="text-lg font-bold invisible">{{$answer->is_correct}}</p>

                <img src="{{Storage::url($answer->picture_path)}}" alt="{{$answer->answer}}" class="w-32 h-32 mt-2">
            </div>
        </div>
    @endforeach
</div>

<script>
    const count = <?php echo $answers->count(); ?>;

    for (let i = 0; i < count; i++) {
        document.getElementById('sound-' + i).addEventListener('click', function () {
            var audioPlayer = document.getElementById('audioPlayer-' + i);
            audioPlayer.play();
        });

        document.getElementById('sound-' + i).addEventListener('click', function () {
            var audioPlayer = document.getElementById('audioPlayer-' + i);
            audioPlayer.play();
        });

        document.getElementById('picture-' + i).addEventListener('click', function () {
            console.log('picture-' + i);
            let answer = document.getElementById('answer-' + i).innerHTML;
            console.log(answer);
            if (answer === '1') {
                alert("правильно!");
            }

            else {
                alert("Попробуй еще!");
            }

        });
    }



</script>