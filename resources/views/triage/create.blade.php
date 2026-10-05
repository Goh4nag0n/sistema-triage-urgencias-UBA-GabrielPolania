@extends('layouts.app')

@section('content')
<div class="card shadow-sm max-w-md mx-auto" style="max-width: 600px;">
    <div class="card-header bg-white">
        <h4 class="mb-0">Registrar Nuevo Triage</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('triage.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Paciente</label>
                <input type="text" name="patient_name" class="form-control @error('patient_name') is-invalid @enderror" value="{{ old('patient_name') }}">
                @error('patient_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Clasificación Manchester</label>
                <select name="manchester_color" class="form-select @error('manchester_color') is-invalid @enderror">
                    <option value="">Seleccione urgencia...</option>
                    <option value="rojo" {{ old('manchester_color') == 'rojo' ? 'selected' : '' }}>Rojo (Inmediato)</option>
                    <option value="naranja" {{ old('manchester_color') == 'naranja' ? 'selected' : '' }}>Naranja (10 min)</option>
                    <option value="amarillo" {{ old('manchester_color') == 'amarillo' ? 'selected' : '' }}>Amarillo (60 min)</option>
                    <option value="verde" {{ old('manchester_color') == 'verde' ? 'selected' : '' }}>Verde (120 min)</option>
                    <option value="azul" {{ old('manchester_color') == 'azul' ? 'selected' : '' }}>Azul (240 min)</option>
                </select>
                @error('manchester_color') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Frecuencia Cardíaca (Opcional)</label>
                <input type="number" name="heart_rate" class="form-control @error('heart_rate') is-invalid @enderror" value="{{ old('heart_rate') }}">
                @error('heart_rate') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Guardar Triage</button>
            <a href="{{ route('triage.index') }}" class="btn btn-link w-100 mt-2">Cancelar</a>
        </form>
    </div>
</div>
@endsection
