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
}
