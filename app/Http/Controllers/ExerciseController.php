<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
class ExerciseController extends Controller
{
    public function show($id)
    {
        $exercise = Exercise::find($id);
        if ($exercise->type->name == "Звук") {
            return view("/exercises/sound-exercise", compact('exercise'));
        } else if ($exercise->type->name == "Текст") {
            return view("/exercises/text-exercise", compact('exercise'));
        } else if ($exercise->type->name == "Тестирование") {
            return view("/exercises/answer-exercise", compact('exercise'));
        } else if ($exercise->type->name == "Дыхание") {
            return view("/exercises/breath-exercise", compact('exercise'));
        }
        return view('errors/404');
    }
}