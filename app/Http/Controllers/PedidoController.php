<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;
use DB;

class PedidoController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request) {
            query = trim($request->get('searchText'));
            $pedidos = Order::join('clients as c', 'c.id', 'orders.client_id')
                ->join('products as p', 'p.id', 'orders.product_id')
                ->select('orders.*', 'c.name as client', 'p.name as product')
                ->where('orders.code', 'like', '%' . $query . '%')
                ->orWhere('orders.date_order', 'like', '%' . $query . '%')
                ->orWhere('c.name', 'like', '%' . $query . '%')
                ->orderBy('orders.code', 'desc')
                ->paginate(10);
        }
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Order $order)
    {
        //
    }

    
    public function edit(Order $order)
    {
        //
    }

    
    public function update(Request $request, Order $order)
    {
        //
    }

    
    public function destroy(Order $order)
    {
        //
    }
}
