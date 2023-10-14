<div>
    @section('title', 'Asignaciones')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="card-title">{{ $componentName }}</h4>
                    <div class="row">
                        <form class="form-inline mt-2">
                            <div class="form-group">
                                <label for="staticEmail2" class="sr-only">Email</label>
                                <select wire:model="role" class="form-control mr-3">
                                    <option value="Elegir" selected>Seleccione un role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button wire:click.prevent="SyncAll()" type="button" class="btn btn-primary waves-effect waves-light mr-3">Seleccionar Todos</button>
                            <button onclick="Revocar()" type="button" class="btn btn-danger waves-effect waves-light">Revocar Todos</button>
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="30">#</th>
                                    <th>Permisos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($permissions) <= 0)
                                    <tr><td colspan="2" class="text-center">Ningún dato disponible en esta tabla</td></tr>
                                @else
                                    @foreach ( $permissions as $permission )
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        wire:change="SyncPermission($('#p' + {{ $permission->id }}).is(':checked'), '{{ $permission->name }}')"
                                                        id="p{{ $permission->id }}"
                                                        value="{{ $permission->id }}"
                                                        {{ $permission->checked == 1 ? 'checked' : '' }}
                                                    >
                                                    <label class="custom-control-label" for="p{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif 
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $permissions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('sync-error', msg => {
            noty(msg)
        });
        window.livewire.on('item-permi', msg => {
            noty(msg)
        });
        window.livewire.on('sync-all', msg => {
            noty(msg)
        });
        window.livewire.on('remove-all', msg => {
            noty(msg)
        });
        
    });

    function Revocar() {
        swal({
            title: 'Confirmar',
            text: '¿Confirmas revocar todos los permisos?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            cancelButtonColor: '#FFFFFF',
            confirmButtonColor: '#7266bb',
            confirmButtonText: 'Aceptar',
        }).then(function(result){
            if (result.value){
                window.livewire.emit('revokeall')
                swal.close()
            }
        })
    }
</script>

