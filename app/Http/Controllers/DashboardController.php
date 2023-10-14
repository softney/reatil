<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index()
    {
        /*----------------------------------
          TOTAL VENTAS MES
        -----------------------------------*/
        $saleMonths = Sale::select(DB::raw('SUM(total) as total'))
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw('Year(created_at)'))
            ->get();        

        /*----------------------------------
          TOTAL VENTAS DIARIAS
        -----------------------------------*/
        $saleDays = Sale::select(DB::raw('SUM(total) as total'))
            ->whereDay('created_at', date('d'))
            ->groupBy(DB::raw('year(created_at)'))
            ->get();

        /*----------------------------------
          TOTAL ARTÍCULOS
        -----------------------------------*/
        //$totalArts = 0;
        //$totalArts = DB::select('SELECT count(*) FROM articulo');
        $totales = DB::table('products')
            ->select(DB::raw('count(*) as total'))
            ->get();

        /*----------------------------------
            ARTÍCULOS CON STOCK = 0
        -----------------------------------*/
        $artstocks = DB::table('products')
            ->select(DB::raw('count(*) as total'))
            ->where('stock', '<=', '10')
            ->get();

        /*----------------------------------
            GRAFICO DE BARRAS
        -----------------------------------*/
        $ventas = Sale::select(DB::raw('SUM(total) as total'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('total');

        $months = Sale::select(DB::raw('Month(created_at) as month'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month) {
            $datas[$month-1] = $ventas[$index];
        }

        /*----------------------------------
          ARTÍCULOS MAS VENDIDOS
        -----------------------------------*/
        $ventasCount = DB::table('products')
            ->join('sale_details', 'products.id', '=', 'sale_details.product_id')
            ->join('sales', 'sale_details.sale_id', '=', 'sales.id')
            ->select('products.barcode', 'products.name', DB::raw('SUM(sale_details.quantity) as cantidad'))
            ->whereYear('sales.created_at', date('Y'))
            ->orderByDesc('cantidad')
            ->groupBy('products.barcode', 'products.name')
            ->limit('10')
            ->get();

        /*----------------------------------
          ARTÍCULOS CON STOCK <= 5
        -----------------------------------*/
        $stocks = DB::table('products')
            ->where('stock', '<=', '10')
            ->orderBy('stock', 'ASC')
            ->get();

        return view('dashboards.index', compact('saleMonths', 'saleDays', 'totales', 'artstocks', 'datas', 'ventasCount', 'stocks'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Sale $sale)
    {
        //
    }

    
    public function edit(Sale $sale)
    {
        //
    }

    
    public function update(Request $request, Sale $sale)
    {
        //
    }

    
    public function destroy(Sale $sale)
    {
        //
    }
}
