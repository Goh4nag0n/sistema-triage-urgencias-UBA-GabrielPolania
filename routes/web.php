<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TriageRecordController;

// Redirigir la raíz directamente al sistema de triage
Route::get('/', function () {
    return redirect()->route('triage.index');
});

// Rutas completas del CRUD para el Triage
Route::resource('triage', TriageRecordController::class);
