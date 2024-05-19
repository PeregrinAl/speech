<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_scenario extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient_id',
        'scenario_id',
    ];
    public function scenarios()
    {
        return $this->belongsTo(Scenario::class, 'scenario_id', 'id');
    }
}
