<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use App\Helpers\Helper;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public $code, $name, $date_order, $quantity, $states, $clientid, $productid, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Pedido';
        $this->clientid = 'Seleccione...';
        $this->productid = 'Seleccione...';
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
            $data = Order::join('clients as c', 'c.id', 'orders.client_id')
                ->join('products as p', 'p.id', 'orders.product_id')
                ->select('orders.*', 'c.name as client', 'p.name as product')
                ->where('orders.code', 'like', '%' . $this->search . '%')
                ->orWhere('orders.date_order', 'like', '%' . $this->search . '%')
                ->orWhere('c.name', 'like', '%' . $this->search . '%')
                ->orderBy('orders.code', 'desc')
                ->paginate($this->pagination);
        else
            $data = Order::join('clients as c', 'c.id', 'orders.client_id')
                ->join('products as p', 'p.id', 'orders.product_id')
                ->select('orders.*', 'c.name as client', 'p.name as product')
                ->orderBy('orders.code', 'desc')
                ->paginate($this->pagination);

        return view('livewire.orders.orders', ['orders' => $data, 
                    'clients' => Client::orderBy('name', 'asc')->get(), 
                    'products' => Product::orderBy('name', 'asc')->get()
                ])
                ->extends('layouts.theme.app')
                ->section('content');
    }

    public function Store()
    {
        $rules = [
            'date_order'    => 'required',
            'quantity'      => 'required',
            'clientid'      => 'required|not_in:Seleccione...',
            'productid'     => 'required|not_in:Seleccione...'
        ];

        $messages = [
            'date_order.required'   => 'Este campo es requerido.',
            'quantity.required'     => 'Este campo es requerido.',
            'clientid.required'     => 'Este campo es requerido.',
            'clientid.not_in'       => 'Seleccione...',
            'productid.required'    => 'Este campo es requerido.',
            'productid.not_in'      => 'Seleccione...'
        ];

        $this->validate($rules, $messages);

        $code = Helper::IDGenerator(new Order, 'code', 6, 'P');
        //dd($code);

        $order = Order::create([
            'code'          => $code,
            'date_order'    => $this->date_order,
            'quantity'      => $this->quantity,
            'client_id'     => $this->clientid,
            'product_id'    => $this->productid
        ]);

        $this->resetUI();
        $this->emit('item-added', 'Pedido registrado.');
    }

    public function Edit(Order $order)
    {
        $this->selected_id  = $order->id;
        $this->code         = $order->code;
        $this->date_order   = $order->date_order;
        $this->quantity     = $order->quantity;
        $this->clientid     = $order->client_id;
        $this->productid    = $order->product_id;
        $this->states       = $order->states;

        $this->emit('modal-show', 'Show Modal');
    }

    public function Update()
    {
        $rules = [
            'date_order'    => 'required',
            'quantity'      => 'required',
            'clientid'      => 'required|not_in:Seleccione...',
            'productid'     => 'required|not_in:Seleccione...',
            'states'        => 'required|not_in:Seleccione...'
        ];

        $messages = [
            'date_order.required'   => 'Este campo es requerido.',
            'quantity.required'     => 'Este campo es requerido.',
            'clientid.required'     => 'Este campo es requerido.',
            'clientid.not_in'       => 'Seleccione un cliente',
            'productid.required'    => 'Este campo es requerido.',
            'productid.not_in'      => 'Seleccione un producto',
            'states.required'       => 'Este campo es requerido.',
            'states.not_in'         => 'Seleccione...'
        ];

        $this->validate($rules, $messages);

        $order = Order::find($this->selected_id);

        $order->update([
            'code'        => $this->code,
            'date_order'  => $this->date_order,
            'quantity'    => $this->quantity,
            'client_id'   => $this->clientid,
            'product_id'  => $this->productid,
            'states'        => $this->states
        ]);

        $this->resetUI();
        $this->emit('item-updated', 'Pedido Actualizado');
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Order $order)
    {
        $order->delete();

        $this->resetUI();
        $this->emit('item-deleted', 'Pedido Completado');
    }

    public function resetUI()
    {
        $this->code = '';
        $this->date_order = '';
        $this->quantity = '';
        $this->clientid = 'Seleccione...';
        $this->productid = 'Seleccione...';
        $this->states = 'Seleccione...';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();
    }
}
