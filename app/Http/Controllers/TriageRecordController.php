<?php

namespace App\Http\Controllers;

use App\Models\TriageRecord;
use App\Http\Requests\StoreTriageRecordRequest;
use Illuminate\Http\Request;

class TriageRecordController extends Controller
{
    public function index()
    {

    }

    public function store(StoreTriageRecordRequest $request)
    {

        $data = $request->validated();
        $triage = TriageRecord::create($data);



        $urgencyLevel = match($triage->manchester_color) {
            'rojo' => 'Crítico - Pase a Resucitación',
            'naranja' => 'Emergencia - Box de Críticos',
            'amarillo' => 'Urgencia - Sala de Espera Interna',
            'verde' => 'Menor - Sala de Espera Externa',
            'azul' => 'No Urgente - Consultorio Externo',
        };


        return response()->json(['message' => 'Registrado con nivel: ' . $urgencyLevel]);
    }

}
