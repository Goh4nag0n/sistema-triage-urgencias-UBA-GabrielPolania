@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Pacientes</h2>
    <a href="{{ route('triage.create') }}" class="btn btn-primary">Nuevo Ingreso</a>
</div>

<form method="GET" action="{{ route('triage.index') }}" class="row g-2 mb-4">
    <div class="col-md-5">
        <input type="text" name="search" class="form-control" placeholder="Buscar por nombre..." value="{{ request('search') }}">
    </div>
    <div class="col-md-3">
        <select name="status" class="form-select">
            <option value="">Todos los estados</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pendiente</option>
            <option value="attended" {{ request('status') == 'attended' ? 'selected' : '' }}>Atendido</option>
        </select>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-secondary w-100">Filtrar</button>
    </div>
</form>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Paciente</th>
                    <th>Color (Manchester)</th>
                    <th>FC (lpm)</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($records as $record)
                <tr>
                    <td>{{ $record->patient_name }}</td>
                    <td><span class="badge bg-{{ $record->manchester_color == 'rojo' ? 'danger' : 'secondary' }}">{{ strtoupper($record->manchester_color) }}</span></td>
                    <td>{{ $record->heart_rate ?? 'N/A' }}</td>
                    <td>{{ $record->status }}</td>
                    <td>
                        <form action="{{ route('triage.destroy', $record) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que desea eliminar este registro?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-3">No hay registros de pacientes que coincidan con la búsqueda.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">
    {{ $records->links('pagination::bootstrap-5') }}
</div>
@endsection
