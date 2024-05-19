<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
                /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_id',
        'exercise_type_id',
        'description',
        'task_voiceover_path',
        'sound_path',
        'signal_path',
        'name',
        'answers',
    ];
}