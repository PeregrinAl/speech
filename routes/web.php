<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaveExerciseText;
use App\Http\Controllers\SaveExerciseSound;
use App\Http\Controllers\SaveExerciseBreath;
use App\Http\Controllers\PatientPageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/403', function () {
        return view('403');
    })->name('403');

Route::get('/404', function () {
        return view('404');
    })->name('404');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    
    
    Route::get('/mainpage', function () {
        return view('mainpage');
    })->name('mainpage');

    Route::get('/patients', function () {
        return view('patients');
    })->name('patients')->middleware('role:specialist');
    
    Route::get('/scenarios', function () {
        return view('scenarios');
    })->name('scenarios')->middleware('role:specialist');

    Route::get('/exercises', function () {
        return view('exercises');
    })->name('exercises')->middleware('role:specialist');
    
    // не используется
    Route::get('/exercises-config', function () {
        return view('exercises-config');
    })->name('exercises-config')->middleware('role:specialist');

    Route::get('/sound-config', function () {
        return view('sound-config');
    })->name('sound-config')->middleware('role:specialist');

    Route::get('/text-config', function () {
        return view('text-config');
    })->name('text-config')->middleware('role:specialist');

    Route::get('/breath-config', function () {
        return view('breath-config');
    })->name('breath-config')->middleware('role:specialist');

    Route::get('/answer-config', function () {
        return view('answer-config');
    })->name('answer-config')->middleware('role:specialist');

    Route::get('/patients/{id}', [PatientPageController::class, 'show'])->name('patient-page');

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

});
