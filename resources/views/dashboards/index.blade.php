@extends('layouts.theme.app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Dashboard</h4>            
        </div>
    </div>
</div> 

<!----------------------------------
  TARJETAS
----------------------------------->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card bg-primary border-primary">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0 text-white">Total Ventas de <b>{{ date('M Y') }}</b></h5>
                </div>
                <div class="row d-flex align-items-center mb-2">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0 text-white">
                            @foreach ($saleMonths as $mes)
                            $ {{ number_format($mes->total,0, ",", ".") }}
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card bg-success border-success">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0 text-white">Total Ventas Diarias</h5>
                </div>
                <div class="row d-flex align-items-center mb-2">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center text-white mb-0">
                            @foreach ($saleDays as $day)
                            $ {{ number_format($day->total,0, ",", "." ?? '0') }}
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card bg-warning border-warning">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0 text-white">Total Artículos</h5>
                </div>
                <div class="row d-flex align-items-center mb-2">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center text-white mb-0">
                            @foreach ($totales as $total)
                           {{ number_format($total->total,0, ",", "." ) }}
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card bg-danger border-warning">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title mb-0 text-white">Artículos sin Stock</h5>
                </div>
                <div class="row d-flex align-items-center mb-2">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center text-white mb-0">
                            @foreach ($artstocks as $stoc)
                            {{ number_format($stoc->total,0, ",", "." ) }}
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
</div>

<!----------------------------------
  GRAFICO DE BARRAS
----------------------------------->
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title d-inline-block">Ventas Año: <b>{{ date('Y') }}</b></h4>
				<canvas id="barChart" height="80"></canvas>
			</div>
		</div>        
    </div>
</div>

<div class="row">
	<!----------------------------------
	  PRODUCTOS MÁS VENDIDOS - 10
	----------------------------------->
	<div class="col-xs-6 col-sm-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title d-inline-block">Productos más vendidos (10)</b></h4>
				<div class="table-responsive">
                 	<table class="table table-striped table-hover table-sm mt-2">
                 		<thead class="">
                 			<tr>
                 				<th>Código</th>
                                <th>Nombre</th>
                                <th class="text-right">Cantidad</th>
                 			</tr>
                 		</thead>
                 		<tbody>
                            @foreach ($ventasCount as $venta)
                            <tr>
                                <td>{{ $venta->barcode }}</td>
                                <td>{{ $venta->name }}</td>
                                <td class="text-right">{{ number_format($venta->cantidad, 0, ",", ".") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                 	</table>
                 </div>
			</div>
		</div>        
    </div>

    <!----------------------------------
	  PRODUCTOS SIN STOCK
	----------------------------------->
	<div class="col-xs-6 col-sm-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title d-inline-block">Productos con stock inferior a 10</b></h4>
				<table class="table table-striped table-hover table-sm mt-2">
                     		<thead>
                     			<tr>
                     				<th>Código</th>
                                    <th>Nombre</th>
                                    <th class="text-right">Cantidad</th>
                     			</tr>
                     		</thead>
                     		<tbody>
                                @foreach ($stocks as $stock)
                                <tr>
                                    <td>{{ $stock->barcode }}</td>
                                    <td>{{ $stock->name }}</td>
                                    <td class="text-right">
                                        <small class="badge badge-danger" style="background-color: red;">{{
                                            $stock->stock }}</small>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                     	</table>
			</div>
		</div>        
    </div>
</div>



@endsection

@section('scripts')
<script>
    var datas = <?php echo json_encode($datas); ?>;
    // Grafico Barras
    var barCanvas = $("#barChart");
    var barChart = new Chart(barCanvas, {
        type: 'bar',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic',],
            datasets: [{
                label: 'Total Ventas',
                data: datas,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


</script>
@endsection