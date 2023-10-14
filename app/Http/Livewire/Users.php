<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $dni, $phone, $email, $profile, $password, $fileLoaded, $image;
    public $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Usuarios';
        $this->profile = 'Seleccione un role';
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
            $data = User::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('dni', 'like', '%' . $this->search . '%')
                ->paginate($this->pagination);
        else
            $data = User::orderBy('name', 'asc')->paginate($this->pagination);

        return view('livewire.users.users', ['users' => $data, 'roles' => Role::orderBy('name', 'asc')->get()])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required',
            'dni' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'profile' => 'required|not_in:Seleccione un role',
            'password' => 'required|min:8'
        ];

        $messages = [
            'name.required' => 'Este campo es requerido.',
            'dni.required' => 'Este campo es requerido.',
            'phone.required' => 'Este campo es requerido.',
            'email.required' => 'Este campo es requerido.',
            'email.email' => 'El campo debe ser una dirección de correo válida.',
            'email.unique' => 'El valor del campo ya está en uso.',
            'profile.required' => 'Este campo es requerido.',
            'profile.not_in' => 'Seleccione un estado.',
            'password.required' => 'Este campo es requerido.',
            'password.min' => 'El campo debe contener al menos 8 caracteres.'
        ];

        $this->validate($rules, $messages);

        $user = User::create([
            'name' => $this->name,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'email' => $this->email,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);

        $user->syncRoles($this->profile);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/users', $customFileName);
            $user->image = $customFileName;
            $user->save();
        }

        $this->resetUI();
        $this->emit('item-added', 'Usuario registrado.');
    }

    public function Edit(User $user)
    {
        $this->selected_id = $user->id;
        $this->name = $user->name;
        $this->dni = $user->dni;
        $this->phone = $user->phone;
        $this->profile = $user->profile;
        $this->email = $user->email;

        $this->emit('modal-show', 'open!');
    }

    public function Update()
    {
        $rules = [
            'name' => 'required',
            'dni' => 'required',
            'phone' => 'required',
            'email' => "required|email|unique:users,email,{$this->selected_id}",
            'profile' => 'required|not_in:Seleccione un role'
        ];

        $messages = [
            'name.required' => 'Este campo es requerido.',
            'dni.required' => 'Este campo es requerido.',
            'phone.required' => 'Este campo es requerido.',
            'email.required' => 'Este campo es requerido.',
            'email.email' => 'El campo debe ser una dirección de correo válida.',
            'email.unique' => 'El valor del campo ya está en uso.',
            'profile.not_in' => 'Seleccione un role.'
        ];

        $this->validate($rules, $messages);

        $user = User::find($this->selected_id);
        $user->update([
            'name' => $this->name,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'email' => $this->email,
            'profile' => $this->profile,
        ]);

        $user->syncRoles($this->profile);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/users', $customFileName);
            $imageTemp = $user->image;
            $user->image = $customFileName;
            $user->save();

            if ($imageTemp != null) {
                if (file_exists('storage/users/'. $imageTemp)) {
                    unlink('storage/users/'. $imageTemp);
                }
            }
        }

        $this->resetUI();
        $this->emit('item-updated', 'Usuario actualizado.');

    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $this->resetUI();
        $this->emit('item-deleted', 'Usuario eliminado.');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
        $this->image = '';
        $this->search = '';
        $this->profile = 'Seleccione un role';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();
    }
}
