<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\ExerciseType;
use App\Models\ExerciseDiagnoses;
use Storage;
class SaveExerciseSound extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'task_voiceover_file' => 'file',
            'sound_file' => 'file',

        ]);

        // Создание новой записи в таблице Exercises
        $exercise = new Exercise();
        $exercise->name = $request->input('name');
        $exercise->description = $request->input('description');
        $exercise->exercise_type_id = ExerciseType::where('name', 'Звук')->first()->id;

        if ($request->hasFile('task_voiceover_file')) {
            $task_voiceover_file = $request->file('task_voiceover_file')->store('public');
            //$task_voiceover_file = Storage::disk('public')->put('sound_exercises/exercises', $request->file('task_voiceover_file'));

            $exercise->task_voiceover_path = $task_voiceover_file;
        }

        if ($request->hasFile('sound_file')) {
            $sound_file = $request->file('sound_file')->store('public');
            //$sound_file = Storage::disk('public')->put('sound_exercises/sounds', $request->file('sound_file'));

            $exercise->sound_path = $sound_file;
        }

        // Сохранение записи в базе данных
        $exercise->save();

        // получение выбранных диагнозов
        $diagnoses_id = $request->input('diagnoses');
        foreach ($diagnoses_id as $diagnosis_id) {
            $exercise_diagnoses = new ExerciseDiagnoses();
            $exercise_diagnoses->diagnosis_id = $diagnosis_id;
            $exercise_diagnoses->exercise_id = $exercise->id;
            $exercise_diagnoses->save();
        }

        // Опционально: перенаправление на другую страницу или отправка ответа
        return redirect()->back()->with('success', 'Exercise saved successfully!');
    }
}
