<div>
    @section('title', 'Usuarios')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="card-title">{{ $componentName }} | {{ $pageTitle }}
                        @can('users.create')
                        <a href="javascript:void(0);" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#theModal">
                            <i class="fa fa-plus-circle"></i>&nbsp; Añadir Registro
                        </a>
                        @endcan
                    </h4>
                    <div class="row">
                        @include('common.searchBox')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Rut</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Perfil</th>
                                    <th class="text-center" width = "50">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) <= 0)
                                    <tr><td colspan="6" class="text-center">Ningún dato disponible en esta tabla</td></tr>
                                @else
                                    @foreach ( $users as $user )
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->dni }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span class="badge {{ $user->profile == 'Administrador' ? 'badge-info' : 'badge-dark' }}">{{ $user->profile }}</span>                                                
                                            </td>
                                            <td class="text-center">
                                                @can('roles.edit')
                                                <a href="javascript:void(0);" wire:click="Edit({{ $user->id }})" class="mr-1">
                                                    <i class="fa fa-pen" aria-hidden="true"></i>
                                                </a>
                                                @endcan

                                                @can('roles.destroy')
                                                <a href="javascript:void(0);" onclick="Confirm('{{ $user->id }}')">
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
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.users.form')
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

