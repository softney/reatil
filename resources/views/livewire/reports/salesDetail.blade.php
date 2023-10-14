<div wire:ignore.self class="modal fade bd-example-modal-lg" id="modal-details" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">
                    
                </h5>
                <h6 class="text-center text-warning" wire:loading>Cargando..</h6>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h4><b>RETAIL</b></h4>
                    </div>
                    <div class="float-right">
                        <h4 class="m-0 d-print-none">Venta</h4>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="mt-3">
                            <p class="mb-2"><strong>Vendedor: </strong> {{ $da->user }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mt-3 float-right">
                            <p class="mb-2"><strong>Fecha Venta: </strong> {{ \Carbon\Carbon::parse($da->created_at)->format('d-m-Y') }}</p>
                            <p class="mb-2"><strong>Estado Venta: </strong> <span class="badge badge-soft-success">{{ $da->status }}</span></p>
                            <p class="mb-2"><strong> </strong> </p>
                        </div>
                    </div><!-- end col -->
                </div>


                <div class="table-responsive mt-3">
                    <table class="table mb-1">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Cantidad</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $details as $da )
                                 <tr>
                                    <td>{{ $da->product }}</td>
                                    <td class="text-right">$ {{ number_format($da->price, 0, ",", ".") }}</td>
                                    <td class="text-right">{{ number_format($da->quantity, 0, ",", ".") }}</td>
                                    <td class="text-right">$ {{ number_format($da->quantity * $da->price, 0, ",", ".") }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <h3>$ {{ number_format($sumDetails, 0, ",", ".") }} CLP</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->