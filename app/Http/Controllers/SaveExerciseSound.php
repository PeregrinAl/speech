<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\ExerciseType;

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
    ]);

    // Создание новой записи в таблице Exercises
    $exercise = new Exercise();
    $exercise->name = $request->input('name');
    $exercise->description = $request->input('description');
    $exercise->exercise_type_id = ExerciseType::where('name', 'Звук')->first()->id;

    if ($request->hasFile('task_voiceover_file')) {
        $file = $request->file('task_voiceover_file');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('sound_exercises/exercises'), $filename);
        $exercise->task_voiceover_path = $filename;
    }
    if ($request->hasFile('sound_file')) {
        $file = $request->file('sound_file');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('sound_exercises/sounds'), $filename);
        $exercise->sound_path = $filename;
    }

    // Сохранение записи в базе данных
    $exercise->save();

    // Опционально: перенаправление на другую страницу или отправка ответа
    return redirect()->back()->with('success', 'Exercise saved successfully!');
    }
}
