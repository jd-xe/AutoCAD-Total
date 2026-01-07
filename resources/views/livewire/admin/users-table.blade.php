<div>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Usuarios</h2>
        <button wire:click="showCreateModal" class="btn btn-accent">
            <i class="bi bi-plus-lg"></i> Nuevo Usuario
        </button>
    </div>

    <div class="row g-2 mb-3">
        {{-- Form para capturar Enter o botón --}}
        <form class="row g-2" wire:submit.prevent="applyFilters">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Buscar por nombre, apellido o DNI"
                    wire:model.defer="search">
            </div>
            <div class="col-md-4">
                <select class="form-select" wire:model.defer="filterRole">
                    <option value="">-- Filtrar por rol --</option>
                    @foreach($roles as $r)
                        <option value="{{ $r->id }}">{{ ucfirst($r->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex">
                <button type="submit" class="btn btn-primary me-2 flex-fill">
                    Filtrar
                </button>
                <button type="button" class="btn btn-light flex-fill" wire:click="$set('search','')">
                    Limpiar búsqueda
                </button>
                <button type="button" class="btn btn-light flex-fill ms-1" wire:click="$set('filterRole','')">
                    Limpiar filtro
                </button>
            </div>
        </form>
    </div>


    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $u)
                    <tr>
                        <td>{{ $u->first_name }} {{ $u->last_name }}</td>
                        <td>{{ $u->dni }}</td>
                        <td>{{ $u->phone }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            @foreach($u->roles as $r)
                                <span class="badge bg-secondary">{{ ucfirst($r->name) }}</span>
                            @endforeach
                        </td>
                        <td class="text-end">
                            <button wire:click="showEditModal({{ $u->id }})" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button wire:click="deleteUser({{ $u->id }})" class="btn btn-sm btn-outline-danger"
                                onclick="confirm('¿Eliminar este usuario?')||event.stopImmediatePropagation()">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No hay usuarios.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $users->links() }}
    </div>

    <div class="mb-3 d-flex justify-content-end">
        <button wire:click="export" class="btn btn-success">
            <i class="bi bi-file-earmark-excel"></i> Exportar Excel
        </button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="userModal" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $modalMode === 'create' ? 'Nuevo Usuario' : 'Editar Usuario' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="saveUser">
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Campos: nombre, apellido, email, dni, teléfono, nacimiento, dirección, roles -->
                            @foreach([['label' => 'Nombre', 'model' => 'first_name', 'type' => 'text'], ['label' => 'Apellido', 'model' => 'last_name', 'type' => 'text'], ['label' => 'Email', 'model' => 'email', 'type' => 'email'], ['label' => 'DNI', 'model' => 'dni', 'type' => 'text'], ['label' => 'Teléfono', 'model' => 'phone', 'type' => 'text'], ['label' => 'Fecha Nac.', 'model' => 'birth_date', 'type' => 'date'],] as $field)
                                <div class="col-md-6">
                                    <label class="form-label">{{ $field['label'] }}</label>
                                    <input type="{{ $field['type'] }}" wire:model.defer="{{ $field['model'] }}"
                                        class="form-control @error($field['model']) is-invalid @enderror">
                                    @error($field['model'])
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="col-12">
                                <label class="form-label">Dirección</label>
                                <input type="text" wire:model.defer="address"
                                    class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Roles</label>
                                <div>
                                    @foreach($roles as $r)
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" wire:model.defer="selectedRoles"
                                                value="{{ $r->id }}">
                                            <span class="form-check-label">{{ ucfirst($r->name) }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('selectedRoles')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">
                            {{ $modalMode === 'create' ? 'Crear' : 'Guardar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('show-user-modal', () => {
                new bootstrap.Modal('#userModal').show();
            });
            window.addEventListener('hide-user-modal', () => {
                bootstrap.Modal.getInstance('#userModal').hide();
            });
        </script>
    @endpush
</div>