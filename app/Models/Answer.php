<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'exercise_id',
        'picture_path',
        'audio_path',
        'is_correct',
    ];

    public function exercise() {
        return $this->belongsTo(Exercise::class);
    }
}
