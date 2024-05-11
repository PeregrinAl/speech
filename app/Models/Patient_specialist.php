<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_specialist extends Model
{
    use HasFactory;

    // вот тут пропиши
// roles:

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'specialist_id',
        'patient_id',
    ];

}
