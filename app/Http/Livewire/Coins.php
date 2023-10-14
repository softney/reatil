<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coin;
use Livewire\WithPagination;

class Coins extends Component
{
    use WithPagination;

    public $type, $value, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Monedas';
        $this->type = 'Seleccione...';
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if (strlen($this->search) > 0)
            $data = Coin::where('type', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $data = Coin::orderBy('type', 'asc')->paginate($this->pagination);

        return view('livewire.coins.coins',['coins' => $data])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Store()
    {
        $rules = [
            'type' => 'required|not_in:Seleccione...',
            'value' => 'required|unique:coins,value'
        ];

        $messages = [
            'type.required' => 'Este campo es requerido.',
            'type.not_in' => 'Seleccione un tipo de moneda.',
            'value.required' => 'Este campo es requerido.',
            'value.unique' => 'El valor del campo ya está en uso.'
        ];

        $this->validate($rules, $messages);

        $coin = Coin::create([
            'type' => $this->type,
            'value' => $this->value
        ]);

        $this->resetUI();
        $this->emit('item-added', 'Moneda registrada.');
    }

    public function Edit(Coin $coin)
    {
        $this->selected_id = $coin->id;        
        $this->type = $coin->type;
        $this->value = $coin->value;

        $this->emit('modal-show', 'show modal');

    }

    public function Update()
    {
        $rules = [
            'type' => 'required|not_in:Seleccione...',
            'value' => "required|unique:coins,value,{$this->selected_id}"
        ];

        $messages = [
            'typw.required' => 'Este campo es requerido.',
            'value.not_in' => 'Seleccione un tipo de moneda.',
            'value.required' => 'Este campo es requerido.',
            'value.unique' => 'El valor del campo ya está en uso.'
        ];

        $this->validate($rules, $messages);

        $coin = Coin::find($this->selected_id);
        $coin->update([
            'type' => $this->type,
            'value' => $this->value
        ]);

        $this->resetUI();
        $this->emit('item-updated', 'Moneda actualizada.');

    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Coin $coin)
    {
        $coin->delete();

        $this->resetUI();
        $this->emit('item-deleted', 'Moneda Eliminada');
    }

    public function resetUI()
    {
        $this->type = '';
        $this->value = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();

    }
}
