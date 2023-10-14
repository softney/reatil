<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Assignments extends Component
{
    use WithPagination;

    public $role, $componentName, $permisosSelected = [], $old_permissions = [];
    private $pagination = 10;

    public function mount()
    {
        $this->role = 'Elegir';
        $this->componentName = 'Asignar Permisos';
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        $permissions = Permission::select('id', 'name', DB::raw("0 as checked"))
            ->orderBy('id', 'asc')
            ->paginate($this->pagination);

        if ($this->role != 'Elegir') {
            $list = Permission::join('role_has_permissions as rp', 'rp.permission_id', 'permissions.id')
            ->where('role_id', $this->role)->pluck('permissions.id')->toArray();

            $this->old_permissions = $list;
        }

        if ($this->role != 'Elegir') {
            foreach ($permissions as $permission) {
                $role = Role::find($this->role);
                $tienePermiso = $role->hasPermissionTo($permission->name);
                if ($tienePermiso) {
                    $permission->checked = 1;
                }
            }
        }

        return view('livewire.assignments.assignments', [
            'roles' => Role::orderBy('name', 'asc')->get(),
            'permissions' => $permissions
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public $listeners = ['revokeall' => 'RemoveAll'];

    public function RemoveAll()
    {
        if ($this->role == 'Elegir') {
            $this->emit('sync-error', 'Seleccione un role válido.');
            return;
        }

        $role = Role::find($this->role);
        $role->syncPermissions([0]);
        $this->emit('remove-all', "Se revocaron los permisos al role $role->name.");
    }
    
    public function SyncAll()
    {
        if ($this->role == 'Elegir') {
            $this->emit('sync-error', 'Seleccione un role válido.');
            return;
        }

        $role = Role::find($this->role);
        $permissions = Permission::pluck('id')->toArray();
        $role->syncPermissions($permissions);
        $this->emit('sync-all', "Se seleccionaron todos los permisos al role $role->name.");
    }

    public function SyncPermission($state, $permisoName)
    {
        if ($this->role != 'Elegir') {
            $roleName = Role::find($this->role);


            if ($state) {
                $roleName->givePermissionTo($permisoName);
                $this->emit('item-permi', "Permiso asignado correctamente.");
            } else {
                $roleName->revokePermissionTo($permisoName);
                $this->emit('item-permi', "Permiso revocado correctamente.");
            }
        } else {
            $this->emit('item-permi', "Seleccione un role válido.");
        }
    }
}
