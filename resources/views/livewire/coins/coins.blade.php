<div>
    @section('title', 'Monedas')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $componentName }} | {{ $pageTitle }}

                        <a href="javascript:void(0);" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#theModal">
                            <i class="fas fa-plus-circle"></i>&nbsp; Añadir Moneda
                        </a>

                    </h4>
                    <div class="row">
                        @include('common.searchBox')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-centered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Tipo Moneda</th>
                                    <th class="text-right" style="padding-right: 20px;">Valor</th>
                                    <th class="text-center" width = "70">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($coins) <= 0)
                                    <tr><td colspan="7" class="text-center">Ningún dato disponible en esta tabla</td></tr>
                                @else
                                    @foreach ( $coins as $coin )
                                        <tr>
                                            <td>{{ $coin->type }}</td>
                                            <td class="text-right" style="padding-right: 20px;">$ {{ number_format($coin->value, 0, ",", ".") }}</td>
                                            <td class="text-center">
                                                @can('coins.edit')
                                                <a href="javascript:void(0);" wire:click="Edit({{ $coin->id }})"class="mr-1">
                                                    <i class="fas fa-pen" aria-hidden="true"></i>
                                                </a>
                                                @endcan

                                                @can('coins.destroy')
                                                <a href="javascript:void(0);" onclick="Confirm('{{ $coin->id }}')">
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
                            {{ $coins->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.coins.form')
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


