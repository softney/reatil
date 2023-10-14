<div>
    @section('title', 'Pedidos')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $componentName }} | {{ $pageTitle }}
                        @can('orders.create')
                        <a href="javascript:void(0);" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#theModal">
                            <i class="fas fa-plus-circle"></i>&nbsp; Añadir Pedido
                        </a>
                        @endcan
                    </h4>
                    <div class="row">
                        @include('common.searchBox')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-centered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>N° Pedido</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Producto</th>
                                    <th class="text-right">Cantidad</th>
                                    <th style="padding-left: 20px;" width="140px">Estado</th>
                                    <th class="text-center" width = "70">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($orders) <= 0)
                                    <tr><td colspan="7" class="text-center">Ningún dato disponible en esta tabla</td></tr>
                                @else
                                    @foreach ( $orders as $order )
                                        <tr>
                                            <td>{{ $order->code }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->date_order)->format('d-m-Y') }}</td>
                                            <td>{{ $order->client }}</td>
                                            <td>{{ $order->product }}</td>
                                            <td class="text-right">{{ number_format($order->quantity, 0, ",", ".") }}</td>
                                            <td style="padding-left: 20px;">
                                                @if ($order->states == 'Pendiente')
                                                    <span class="badge badge-danger">{{ $order->states }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ $order->states }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @can('orders.edit')
                                                <a href="javascript:void(0);" wire:click="Edit({{ $order->id }})"class="mr-1">
                                                    <i class="fas fa-pen" aria-hidden="true"></i>
                                                </a>
                                                @endcan

                                                @can('orders.destroy')
                                                <a href="javascript:void(0);" onclick="Confirm('{{ $order->id }}')">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.orders.form')
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('item-added', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('item-updated', msg => {
            $('#theModal').modal('hide')
            noty(msg)
        });
        window.livewire.on('item-deleted', msg => {
            noty(msg)
        });
        window.livewire.on('modal-show', msg => {
            $('#theModal').modal('show')
        });
        window.livewire.on('modal-hide', msg => {
            $('#theModal').modal('hide')
        });

    });

    function Confirm(id) {
        swal({
            title: 'Confirmar',
            text: '¿Confirmas eliminar el registro?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            cancelButtonColor: '#FFFFFF',
            confirmButtonColor: '#7266bb',
            confirmButtonText: 'Aceptar',
        }).then(function(result){
            if (result.value){
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }

</script>

@section('scripts')
<script>
    $("#pcliente").change(mostrarValores);

    function mostrarValores(){
        datosCliente = document.getElementById('pcliente').value.split('_');
        $(".pdireccion").val(datosCliente[1]);
        $(".pcomuna").val(datosCliente[2]);
    }

</script>

@endsection

