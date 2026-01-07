<?php

namespace App\Livewire\Admin;

use App\Models\CourseGroup;
use App\Models\Resource;
use App\Services\CloudinaryService;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ResourcesTable extends Component
{
    use WithFileUploads;

    public $resources, $groups;
    public $course_group_id, $name, $description, $file, $type;
    public $resourceId, $modalMode = '';

    protected function rules()
    {
        return [
            'course_group_id' => ['required', Rule::exists('course_groups', 'id')],
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'type'            => 'required|in:pdf,ppt,doc',
            'file'            => $this->modalMode === 'create'
                ? 'required|file|max:5120|mimes:pdf,ppt,pptx,doc,docx'
                : 'nullable|file|max:5120|mimes:pdf,ppt,pptx,doc,docx',
        ];
    }

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->resources = Resource::with('courseGroup.course')->orderByDesc('created_at')->get();
        $this->groups    = CourseGroup::with('course')->get();
    }

    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->dispatch('show-resource-modal');
    }

    public function showEditModal($id)
    {
        $res = Resource::findOrFail($id);
        $this->resourceId     = $id;
        $this->course_group_id = $res->course_group_id;
        $this->name           = $res->name;
        $this->description    = $res->description;
        $this->type           = $res->type;
        // no validamos file en edit
        $this->modalMode      = 'edit';
        $this->dispatch('show-resource-modal');
    }

    public function saveResource(CloudinaryService $cloudinary)
    {
        $this->validate();

        $url = null;
        if ($this->modalMode === 'create' && $this->file) {
            // sube a Cloudinary
            $url = $cloudinary->uploadFile($this->file, "AMISAM/Resources/{$this->course_group_id}");
            if (!$url) {
                $this->addError('file', 'Error subiendo el archivo.');
                return;
            }
        }

        $data = [
            'course_group_id' => $this->course_group_id,
            'name'            => $this->name,
            'description'     => $this->description,
            'type'            => $this->type,
        ];
        if ($url) {
            $data['file_url'] = $url;
        }

        if ($this->modalMode === 'create') {
            Resource::create($data);
            session()->flash('success', 'Recurso creado.');
        } else {
            $res = Resource::findOrFail($this->resourceId);
            $res->update($data);
            session()->flash('success', 'Recurso actualizado.');
        }

        $this->dispatch('hide-resource-modal');
        $this->loadData();
        $this->resetForm();
    }

    public function deleteResource($id)
    {
        Resource::findOrFail($id)->delete();
        session()->flash('success', 'Recurso eliminado.');
        $this->loadData();
    }

    private function resetForm()
    {
        $this->reset(['course_group_id', 'name', 'description', 'file', 'type', 'resourceId']);
        $this->modalMode = '';
    }

    public function render()
    {
        return view('livewire.admin.resources-table');
    }
}
