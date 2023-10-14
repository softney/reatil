<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class Permissions extends Component
{
    use WithPagination;

    public $permissionName, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Permisos';
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
            $data = Permission::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $data = Permission::orderBy('id', 'asc')->paginate($this->pagination);

        return view('livewire.permissions.permissions', ['permissions' => $data])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function CreatePermission()
    {
        $rules = [
            'permissionName' => 'required|unique:permissions,name'
        ];

        $messages = [
            'permissionName.required' => 'Este campo es requerido',
            'permissionName.unique' => 'El valor del campo ya está en uso.'
        ];

        $this->validate($rules, $messages);

        $permission = Permission::create([
            'name' => $this->permissionName
        ]);

        $this->resetUI();
        $this->emit('item-added', 'Permiso registrado.');
    }

    public function Edit(Permission $permission)
    {
        $this->permissionName = $permission->name;
        $this->selected_id = $permission->id;

        $this->emit('modal-show', 'show modal');
    }

    public function UpdatePermission()
    {
        $rules = [
            'permissionName' => "required|unique:permissions,name,{$this->selected_id}"
        ];

        $messages = [
            'permissionName.required' => 'Este campo es requerido',
            'permissionName.unique' => 'El valor del campo ya está en uso.'
        ];

        $this->validate($rules, $messages);

        $permission = Permission::find($this->selected_id);
        $permission->update([
            'name' => $this->permissionName
        ]);

        $this->resetUI();
        $this->emit('item-updated', 'Permiso actualizado.');
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy($id)
    {
        $rolesCount = Permission::find($id)->getRoleNames()->count();
        if ($rolesCount > 0) {
            $this->emit('item-error', 'No se puede elimianr el permiso porque tiene roles asociados.');
            return;
        }
        $permission = Permission::find($id);
        $permission->delete();

        $this->resetUI();
        $this->emit('item-deleted', 'Permiso eliminado.');
    }

    public function resetUI()
    {
        $this->permissionName = '';
        $this->search = '';
        $this->selected_id = 0;        
        $this->resetValidation();
        $this->resetPage();
    }
}
