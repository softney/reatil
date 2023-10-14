<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function reportExcel($userId, $reportType, $dateFrom = null, $dateTo = null)
    {
        $reportName = 'Reporte de Ventas_' . uniqid() . '.xlsx';

        return Excel::download(new SalesExport($userId, $reportType, $dateFrom, $dateTo), $reportName );
    }
}
