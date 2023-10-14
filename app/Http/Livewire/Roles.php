<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;

    public $roleName, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Roles';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if (strlen($this->search) > 0)
            $data = Role::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $data = Role::orderBy('name', 'asc')->paginate($this->pagination);

        return view('livewire.roles.roles', ['roles' => $data])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function CreateRole()
    {
        $rules = [
            'roleName' => 'required|unique:roles,name'
        ];

        $messages = [
            'roleName.required' => 'Este campo es requerido',
            'roleName.unique' => 'El valor del campo ya está en uso.'
        ];

        $this->validate($rules, $messages);

        $role = Role::create([
            'name' => $this->roleName
        ]);

        $this->resetUI();
        $this->emit('item-added', 'Role registrado.');
    }

    public function Edit(Role $role)
    {
        $this->roleName = $role->name;
        $this->selected_id = $role->id;

        $this->emit('modal-show', 'show modal');
    }

    public function UpdateRole()
    {
        $rules = [
            'roleName' => "required|unique:roles,name,{$this->selected_id}"
        ];

        $messages = [
            'roleName.required' => 'Este campo es requerido',
            'roleName.unique' => 'El valor del campo ya está en uso.'
        ];

        $this->validate($rules, $messages);

        $role = Role::find($this->selected_id);
        $role->update([
            'name' => $this->roleName
        ]);

        $this->resetUI();
        $this->emit('item-updated', 'Role actualizado.');
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy($id)
    {
        $permissionsCount = Role::find($id)->permissions->count();
        if ($permissionsCount > 0) {
            $this->emit('item-error', 'No se puede elimianr el role porque tiene permisos asociados.');
            return;
        }
        $role = Role::find($id);
        $role->delete();

        $this->resetUI();
        $this->emit('item-deleted', 'Role eliminado.');
    }

    public function resetUI()
    {
        $this->roleName = '';
        $this->search = '';
        $this->selected_id = 0;        
        $this->resetValidation();
        $this->resetPage();
    }
}
