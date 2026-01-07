@extends('components.layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Gestión de Pagos</h2>

    {{-- Filtros --}}
    <form method="GET" class="row g-3 mb-4 align-items-end">
        <div class="col-md-3">
            <label class="form-label">Tipo de Pago</label>
            <select name="type" class="form-select">
                <option value="">— Todos —</option>
                <option value="enrollment" @selected(request('type')=='enrollment')>Matrículas</option>
                <option value="document"   @selected(request('type')=='document')>Documentos</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Estado</label>
            <select name="status" class="form-select">
                <option value="">— Todos —</option>
                <option value="pending"      @selected(request('status')=='pending')>Pendiente</option>
                <option value="verification" @selected(request('status')=='verification')>Verificación</option>
                <option value="approved"     @selected(request('status')=='approved')>Aprobado</option>
                <option value="rejected"     @selected(request('status')=='rejected')>Rechazado</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Desde</label>
            <input type="date" name="date_from" value="{{ request('date_from') }}" class="form-control">
        </div>
        <div class="col-md-2">
            <label class="form-label">Hasta</label>
            <input type="date" name="date_to" value="{{ request('date_to') }}" class="form-control">
        </div>
        <div class="col-md-1 d-grid">
            <button class="btn btn-outline-secondary">Filtrar</button>
        </div>
        <div class="col-md-1 d-grid">
            <a href="{{ route('admin.payments') }}" class="btn btn-outline-danger">Limpiar</a>
        </div>
    </form>

    {{-- Tabla de pagos --}}
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Estudiante</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Comprobante</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->user->first_name }} {{ $p->user->last_name }}</td>
                        <td>{{ $p->concept->name }}</td>
                        <td>S/ {{ number_format($p->amount,2) }}</td>
                        <td>
                            @if($p->receipt_url)
                                <button type="button"
                                        class="btn btn-sm btn-outline-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#receiptModal{{ $p->id }}">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge
                                @switch($p->status)
                                    @case('pending')      bg-secondary @break
                                    @case('verification') bg-info     @break
                                    @case('approved')     bg-success  @break
                                    @case('rejected')     bg-danger   @break
                                @endswitch">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-nowrap">
                            @if($p->status === 'verification')
                                <form action="{{ route('admin.payments.approve', $p->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-success"
                                            onclick="return confirm('¿Aprobar pago?')">
                                        ✔️
                                    </button>
                                </form>
                                <form action="{{ route('admin.payments.reject', $p->id) }}"
                                      method="POST" class="d-inline ms-1">
                                    @csrf
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Rechazar pago?')">
                                        ❌
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>

                    {{-- Modal de comprobante --}}
                    @if($p->receipt_url)
                    <div class="modal fade" id="receiptModal{{ $p->id }}" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content bg-dark text-white">
                          <div class="modal-header">
                            <h5 class="modal-title">Comprobante #{{ $p->id }}</h5>
                            <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body text-center">
                            <img src="{{ $p->receipt_url }}"
                                 alt="Comprobante {{ $p->id }}"
                                 class="img-fluid">
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="mt-3">
        {{ $payments->withQueryString()->links() }}
    </div>
</div>
@endsection
