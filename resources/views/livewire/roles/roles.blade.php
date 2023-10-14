<div>
    @section('title', 'Roles')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $componentName }} | {{ $pageTitle }}

                        <a href="javascript:void(0);" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#theModal">
                            <i class="fas fa-plus-circle"></i>&nbsp; Añadir Role
                        </a>

                    </h4>
                    <div class="row">
                        @include('common.searchBox')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="30">#</th>
                                    <th>Roles</th>
                                    <th class="text-center" width = "50">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($roles) <= 0)
                                    <tr><td colspan="2" class="text-center">Ningún dato disponible en esta tabla</td></tr>
                                @else
                                    @foreach ( $roles as $role )
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td class="text-center">
                                                @can('roles.edit')
                                                <a href="javascript:void(0);" wire:click="Edit({{ $role->id }})"
                                                    class="mr-1" data-toggle="tooltip" data-placement="top" title="Modificar">
                                                    <i class="fa fa-pen" aria-hidden="true"></i>
                                                </a>
                                                @endcan

                                                @can('roles.destroy')
                                                <a href="javascript:void(0);" onclick="Confirm('{{ $role->id }}')"
                                                    data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif 
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.roles.form')
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


