<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\TriageRecord;
use App\Http\Requests\StoreTriageRecordRequest;
use App\Enums\ManchesterColorEnum;
use Illuminate\Http\RedirectResponse;

class TriageRecordController extends Controller
{


    public function store(StoreTriageRecordRequest $request): RedirectResponse
    {
        $data = $request->validated();


        $priorityMessage = ManchesterColorEnum::resolvePriority($data['manchester_color']);


        $triage = TriageRecord::create($data);


        $heartRateLog = $triage?->heart_rate ?? 'Sin registro';

        return redirect()->back()->with('success', "Registrado. Prioridad: {$priorityMessage}. FC: {$heartRateLog} lpm.");
    }



    public function index(\Illuminate\Http\Request $request)
    {
        $query = TriageRecord::query();

        if ($request->filled('search')) {
            $query->where('patient_name', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $records = $query->latest()->paginate(10);
        return view('triage.index', compact('records'));
    }

    public function create()
    {
        return view('triage.create');
    }

    public function destroy(TriageRecord $triage)
    {
        $triage->delete();
        return redirect()->route('triage.index')->with('success', 'Registro eliminado correctamente.');
    }

    public function update(\Illuminate\Http\Request $request, TriageRecord $triage)
    {
        // Cambiamos el estado a 'attended' (atendido)
        $triage->update(['status' => 'attended']);

        return redirect()->route('triage.index')->with('success', "¡Listo! El paciente {$triage->patient_name} ha sido marcado como atendido.");
    }
}
