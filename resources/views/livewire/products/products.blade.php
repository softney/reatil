<div>
    @section('title', 'Productos')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $componentName }} | {{ $pageTitle }}

                        <a href="javascript:void(0);" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#theModal">
                            <i class="fas fa-plus-circle"></i>&nbsp; Añadir Producto
                        </a>

                    </h4>
                    <div class="row">
                        @include('common.searchBox')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-centered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Barcode</th>
                                    <th class="text-right">P. Venta</th>
                                    <th class="text-right">Stock</th>
                                    <th class="text-right">Inv. Min.</th>
                                    <th class="text-center">Imagen</th>
                                    <th class="text-center" width = "70">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($products) <= 0)
                                    <tr><td colspan="7" class="text-center">Ningún dato disponible en esta tabla</td></tr>
                                @else
                                    @foreach ( $products as $product )
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->barcode }}</td>
                                            <td class="text-right">$ {{ number_format($product->price, 0, ",", ".") }}</td>
                                            <td class="text-right">{{ number_format($product->stock, 0, ",", ".") }}</td>
                                            <td class="text-right">{{ number_format($product->alerts, 0, ",", ".") }}</td>
                                            <td class="text-center">
                                                <img src="storage/products/{{ $product->image }}" width="15%">
                                            </td>
                                            <td class="text-center">
                                                @can('products.edit')
                                                <a href="javascript:void(0);" wire:click="Edit({{ $product->id }})"class="mr-1">
                                                    <i class="fas fa-pen" aria-hidden="true"></i>
                                                </a>
                                                @endcan

                                                @can('products.destroy')
                                                <a href="javascript:void(0);" onclick="Confirm('{{ $product->id }}')">
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
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.products.form')
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

