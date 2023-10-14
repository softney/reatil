<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithPagination, WithFileUploads;

    public $name, $barcode, $cost, $price, $stock, $alerts, $image, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Productos';
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
            $data = Product::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('barcode', 'like', '%' . $this->search . '%')
                ->paginate($this->pagination);
        else
            $data = Product::orderBy('name', 'asc')->paginate($this->pagination);

        return view('livewire.products.products', ['products' => $data])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required',
            'barcode' => 'required|unique:products,barcode',
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'alerts' => 'required'
        ];

        $messages = [
            'name.required' => 'Este campo es reuerido.',
            'barcode.required' => 'Este campo es requerido',
            'barcode.unique' => 'El valor del campo ya está en uso.',
            'cost.required' => 'Este campo es requerido',
            'price.required' => 'Este campo es requerido',
            'stock.required' => 'Este campo es requerido',
            'alerts.required' => 'Este campo es requerido',
        ];

        $this->validate($rules, $messages);

        $product = Product::create([
            'name' => $this->name,
            'barcode' => $this->barcode,
            'cost' => $this->cost,
            'price' => $this->price,
            'stock' => $this->stock,
            'alerts' => $this->alerts
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products', $customFileName);
            $product->image = $customFileName;
            $product->save();
        }

        $this->resetUI();
        $this->emit('item-added', 'Producto Registrado');
    }

    public function Edit(Product $product)
    {
        $this->selected_id = $product->id;
        $this->name = $product->name;
        $this->barcode = $product->barcode;
        $this->cost = $product->cost;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->alerts = $product->alerts;
        $this->image = $product->image;

        $this->emit('modal-show', 'Show Modal');
    }

    public function Update()
    {
        $rules = [
            'name' => 'required',
            'barcode' => "required|unique:products,barcode,{$this->selected_id}",
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'alerts' => 'required'
        ];

        $messages = [
            'name.required' => 'Este campo es reuerido.',
            'barcode.required' => 'Este campo es requerido',
            'barcode.unique' => 'El valor del campo ya está en uso.',
            'cost.required' => 'Este campo es requerido',
            'price.required' => 'Este campo es requerido',
            'stock.required' => 'Este campo es requerido',
            'alerts.required' => 'Este campo es requerido'
        ];

        $this->validate($rules, $messages);

        $product = Product::find($this->selected_id);

        $product->update([
            'name' => $this->name,
            'barcode' => $this->barcode,
            'cost' => $this->cost,
            'price' => $this->price,
            'stock' => $this->stock,
            'alerts' => $this->alerts
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products', $customFileName);
            $imageTemp = $product->image;
            $product->image = $customFileName;
            $product->save();

            if ($imageTemp != null) {
                if (file_exists('storage/products/'. $imageTemp)) {
                    unlink('storage/products/'. $imageTemp);
                }
            }
        }

        $this->resetUI();
        $this->emit('item-updated', 'Producto Actualizado');
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Product $product)
    {
        $product->delete();

        $this->resetUI();
        $this->emit('item-deleted', 'Producto Eliminado');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->barcode = '';
        $this->cost = '';
        $this->price = '';
        $this->stock = '';
        $this->alerts = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();
    }
}
