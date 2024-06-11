<?php

namespace App\Models;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseScenario extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $fillable = [
        'scenario_id',
        'exercise_id',
        'repeat_count',
        'order',
        'speed_factor',
    ];
    public function scenario()
    {
        return $this->belongsTo(Scenario::class);
    }

    public function exercise() {
        return $this->belongsTo(Exercise::class);
    }
}
