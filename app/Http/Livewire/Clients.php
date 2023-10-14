<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\Commune;
use Livewire\WithPagination;

class Clients extends Component
{
    use WithPagination;

    public $name, $phone, $email, $address, $communeid, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Clientes';
        $this->communeid = 'Seleccione una comuna';
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
            $data = Client::join('communes as c', 'c.id', 'clients.commune_id')
                ->select('clients.*', 'c.name as communa')
                ->where('clients.name', 'like', '%' . $this->search . '%')
                ->orWhere('c.name', 'like', '%' . $this->search . '%')
                ->orderBy('clients.name', 'asc')
                ->paginate($this->pagination);
        else
            $data = Client::join('communes as c', 'c.id', 'clients.commune_id')
                ->select('clients.*', 'c.name as commune')
                ->orderBy('clients.name', 'asc')
                ->paginate($this->pagination);

        return view('livewire.clients.clients', 
            ['clients' => $data, 'communes' => Commune::orderBy('name', 'asc')->get()])
                ->extends('layouts.theme.app')
                ->section('content');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:clients,email',
            'address' => 'required',
            'communeid' => 'required|not_in:Seleccione una comuna'
        ];

        $messages = [
            'name.required' => 'Este campo es requerido.',
            'phone.required' => 'Este campo es requerido.',
            'email.required' => 'Este campo es requerido.',
            'email.unique' => 'El valor del campo ya está en uso.',
            'email.email' => 'El campo debe ser una dirección de correo válida.',
            'address.required' => 'Este campo es requerido.',
            'communeid.required' => 'Este campo es requerido.',
            'communeid.not_in' => 'Seleccione una comuna'
        ];

        $this->validate($rules, $messages);

        $client = Client::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'commune_id' => $this->communeid
        ]);

        $this->resetUI();
        $this->emit('item-added', 'Cliente registrado.');
    }

    public function Edit(Client $client)
    {
        $this->selected_id = $client->id;
        $this->name = $client->name;
        $this->phone = $client->phone;
        $this->email = $client->email;
        $this->address = $client->address;
        $this->communeid = $client->commune_id;

        $this->emit('modal-show', 'show modal');
    }

    public function Update()
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => "required|email|unique:clients,email,{$this->selected_id}",
            'address' => 'required',
            'communeid' => 'required|not_in:Seleccione una comuna'
        ];

        $messages = [
            'name.required' => 'Este campo es requerido.',
            'phone.required' => 'Este campo es requerido.',
            'email.required' => 'Este campo es requerido.',
            'email.unique' => 'El valor del campo ya está en uso.',
            'email.email' => 'El campo debe ser una dirección de correo válida.',
            'address.required' => 'Este campo es requerido.',
            'communeid.required' => 'Este campo es requerido.',
            'communeid.not_in' => 'Seleccione una comuna'
        ];

        $this->validate($rules, $messages);

        $client = Client::find($this->selected_id);
        $client->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'commune_id' => $this->communeid
        ]);

        $this->resetUI();
        $this->emit('item-updated', 'Cliente actualizado.');
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Client $client)
    {
        $client->delete();

        $this->resetUI();
        $this->emit('item-deleted', 'Cliente eliminado.');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->address = '';
        $this->communeid = 'Seleccione una comuna';
        $this->search = '';
        $this->selected_id = 0;        
        $this->resetValidation();
        $this->resetPage();

    }
}
