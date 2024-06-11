<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'specialist_id',
        'time_available',
        'is_training',
        'name',
    ];

    public function exercises() {
        return $this->belongsToMany(Exercise::class, 'exercise_scenarios');
    }

    public function scenario_exercises() {
        return $this->hasMany(ExerciseScenario::class);
    }

}
