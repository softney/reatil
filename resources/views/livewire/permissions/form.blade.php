<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $componentName }}</b> | {{ $selected_id > 0 ? 'Editar' : 'Crear' }} <span class="text-warning" style="font-size: 12px;" wire:loading>&nbsp; Cargando...</span></h5>
                <button type="button"  wire:click.prevent="resetUI()" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="permissionName">Role : <span class="text-danger">*</span></label>
                            <input type="text"  wire:model.lazy="permissionName" class="form-control" placeholder="Ingrese un permiso">
                            @error('permissionName')<span class="text-danger er">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"  wire:click.prevent="resetUI()" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                @if ($selected_id < 1)
                    <button type="button"  wire:click.prevent="CreatePermission()" class="btn btn-primary waves-effect waves-light close-modal">Guardar Registros</button>
                @else
                    <button type="button"  wire:click.prevent="UpdatePermission()" class="btn btn-info waves-effect waves-light close-modal">Actualizar Registros</button>
                @endif
            </div>
        </div>
    </div>
</div>