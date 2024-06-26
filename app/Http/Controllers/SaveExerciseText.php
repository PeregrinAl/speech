<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\ExerciseType;
use App\Models\ExerciseDiagnoses;
class SaveExerciseText extends Controller
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
        ]);

        // Создание новой записи в таблице Exercises
        $exercise = new Exercise();
        $exercise->name = $request->input('name');
        $exercise->description = $request->input('description');
        $exercise->text = $request->input('text');
        $exercise->exercise_type_id = ExerciseType::where('name', 'Текст')->first()->id;

        if ($request->hasFile('task_voiceover_file')) {
            $task_voiceover_file = $request->file('task_voiceover_file')->store('public');

            $exercise->task_voiceover_path = $task_voiceover_file;
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
