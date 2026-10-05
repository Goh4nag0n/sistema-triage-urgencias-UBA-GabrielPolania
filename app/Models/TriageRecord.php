<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TriageRecord extends Model
{
    use HasFactory;

    // Autorizamos la inserción masiva para estos campos
    protected $fillable = [
        'patient_name',
        'manchester_color',
        'heart_rate',
        'status',
    ];
}
