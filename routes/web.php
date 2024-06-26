<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaveExerciseText;
use App\Http\Controllers\SaveExerciseSound;
use App\Http\Controllers\SaveExerciseBreath;
use App\Http\Controllers\PatientPageController;
use App\Http\Controllers\ScenarioConfigController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ScenarioController;
use App\Http\Controllers\AudioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|
|
Приветствие - главный экран
|
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|
|
Ошибки (403, 404)
|
|
*/

Route::get('/403', function () {
        return view('403');
    })->name('403');

Route::get('/404', function () {
        return view('404');
    })->name('404');

/*
|
|
Аутентификация
|
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

/*
|
|
Главная страница
|
|
*/
    
    Route::get('/mainpage', function () {
        return view('mainpage');
    })->name('mainpage');

/*
|
|
Страницы навигации
|
|
*/

// пациенты

    Route::get('/pages/patients', function () {
        return view('/pages/patients');
    })->name('patients')->middleware('role:specialist');

// сценарии
    
    Route::get('/pages/scenarios', function () {
        return view('/pages/scenarios');
    })->name('scenarios')->middleware('role:specialist');

// упражнения

    Route::get('/pages/exercises', function () {
        return view('/pages/exercises');
    })->name('exercises')->middleware('role:specialist');

/*
|
|
Конфигураторы упражнений
|
|
*/

// звук

    Route::get('/exercise_config/sound-config', function () {
        return view('/exercise_config/sound-config');
    })->name('sound-config')->middleware('role:specialist');

// текст

    Route::get('/exercise_config/text-config', function () {
        return view('/exercise_config/text-config');
    })->name('text-config')->middleware('role:specialist');

// дыхание

    Route::get('/exercise_config/breath-config', function () {
        return view('/exercise_config/breath-config');
    })->name('breath-config')->middleware('role:specialist');

// тестирование

    Route::get('/exercise_config/answer-config', function () {
        return view('/exercise_config/answer-config');
    })->name('answer-config')->middleware('role:specialist');

/*
|
|
Упражнения
|
|
*/

// звук

    Route::get('/exercises/sound-exercise', function () {
        return view('/exercises/sound-exercise');
    })->name('sound-exercise')->middleware('role:specialist, patient');

// текст

    Route::get('/exercises/text-exercise', function () {
        return view('/exercises/text-exercise');
    })->name('text-exercise')->middleware('role:specialist, patient');

// дыхание

    Route::get('/exercises/breath-exercise', function () {
        return view('/exercises/breath-exercise');
    })->name('breath-exercise')->middleware('role:specialist, patient');

// тестирование

    Route::get('/exercises/answer-exercise', function () {
        return view('/exercises/answer-exercise');
    })->name('answer-exercise')->middleware('role:specialist, patient');

// **ДЕМНОСТРАЦИЯ УПРАЖНЕНИЯ ПО ИДЕНТИФИКАТОРУ**

    Route::get('/exercises/{id}', [ExerciseController::class, 'show'])->name('exercise');

// **ДЕМНОСТРАЦИЯ СТРАНИЦЫ ПАЦИЕНТА ПО ИДЕНТИФИКАТОРУ**

    Route::get('/patients/{id}', [PatientPageController::class, 'show'])->name('patient-page');
    
// **ДЕМНОСТРАЦИЯ КОНФИГУРАТОРА СЦЕНАРИЯ ПО ИДЕНТИФИКАТОРУ**

    Route::get('/scenarios/{id}', [ScenarioConfigController::class, 'show'])->name('scenario-config')->middleware('role:specialist, patient');;

// сценарий

    Route::get('/scenarios/scenario-compleeting/{id}', [ScenarioController::class, 'show'])->name('scenario');


    //например!
    Route::get('/doctor-cabinet/home', function () {
        return view('doctor-cabinet');
    })->name('doctor-cabinet')->middleware('role:doctor,superdoctor,supersuperdoctor');


    Route::get('/patient-cabinet/home', function () {
        return view('patient-cabinet');
    })->name('patient-cabinet')->middleware('role:patient');

    Route::post('/save-exercise-text', [SaveExerciseText::class, '__invoke'])->name('save.exercise.text');

    Route::post('/save-exercise-sound', [SaveExerciseSound::class, '__invoke'])->name('save.exercise.sound');

    Route::post('/save-exercise-breath', [SaveExerciseBreath::class, '__invoke'])->name('save.exercise.breath');

    // Route::get('/get-audio/{filename}', 'SongsController@get_audio')->name('getAudio');

});
