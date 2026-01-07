<div>
  @if(session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="d-flex justify-content-between mb-3">
    <h2>Recursos</h2>
    <button wire:click="showCreateModal" class="btn btn-accent">
      <i class="bi bi-plus-lg"></i> Nuevo Recurso
    </button>
  </div>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>Curso / Grupo</th><th>Nombre</th><th>Tipo</th><th>Fecha</th><th class="text-end">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($resources as $r)
        <tr>
          <td>{{ $r->courseGroup->course->name }} #{{ $r->course_group_id }}</td>
          <td>{{ $r->name }}</td>
          <td>{{ strtoupper($r->type) }}</td>
          <td>{{ $r->created_at->format('d/m/Y') }}</td>
          <td class="text-end">
            <a href="{{ $r->file_url }}" target="_blank" class="btn btn-sm btn-outline-light me-2">
              <i class="bi bi-download"></i>
            </a>
            <button wire:click="showEditModal({{ $r->id }})" class="btn btn-sm btn-outline-light me-2">
              <i class="bi bi-pencil-fill"></i>
            </button>
            <button wire:click="deleteResource({{ $r->id }})"
                    class="btn btn-sm btn-outline-danger"
                    onclick="confirm('¿Eliminar este recurso?')||event.stopImmediatePropagation()">
              <i class="bi bi-trash-fill"></i>
            </button>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center py-4">No hay recursos.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Modal --}}
  <div class="modal fade" id="resourceModal" wire:ignore.self>
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title">
            {{ $modalMode==='create' ? 'Nuevo Recurso' : 'Editar Recurso' }}
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <form wire:submit.prevent="saveResource">
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Curso / Grupo</label>
              <select wire:model.defer="course_group_id"
                      class="form-select @error('course_group_id') is-invalid @enderror">
                <option value="">-- Elige --</option>
                @foreach($groups as $g)
                  <option value="{{ $g->id }}">
                    {{ $g->course->name }} #{{ $g->id }}
                  </option>
                @endforeach
              </select>
              @error('course_group_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Nombre</label>
              <input type="text" wire:model.defer="name"
                     class="form-control @error('name') is-invalid @enderror">
              @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Descripción</label>
              <textarea wire:model.defer="description"
                        class="form-control @error('description') is-invalid @enderror"></textarea>
              @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Tipo</label>
                <select wire:model.defer="type"
                        class="form-select @error('type') is-invalid @enderror">
                  <option value="">-- Elige --</option>
                  <option value="pdf">PDF</option>
                  <option value="ppt">PPT</option>
                  <option value="doc">DOC</option>
                </select>
                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">Archivo</label>
                <input type="file" wire:model="file"
                       class="form-control @error('file') is-invalid @enderror"
                       {{ $modalMode==='edit'?'':'required' }}>
                @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="form-text">Max. 5MB. PDF/PPT/DOC.</div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">
              {{ $modalMode==='create' ? 'Crear' : 'Guardar' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    window.addEventListener('show-resource-modal', () => {
      new bootstrap.Modal(document.getElementById('resourceModal')).show();
    });
    window.addEventListener('hide-resource-modal', () => {
      bootstrap.Modal.getInstance(document.getElementById('resourceModal')).hide();
    });
  </script>
  @endpush
</div>
