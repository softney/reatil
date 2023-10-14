<div wire:ignore.self class="modal fade bd-example-modal-lg" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $componentName }}</b> | {{ $selected_id > 0 ? 'Editar' : 'Crear' }} <span class="text-warning" style="font-size: 12px;" wire:loading>&nbsp; Cargando...</span></h5>
                <button type="button"  wire:click.prevent="resetUI()" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="dni">Rut : <span class="text-danger">*</span></label>
                        <input type="text"  wire:model.lazy="dni" class="form-control" placeholder="Ingrese un rut"
                        data-toggle="input-mask" data-mask-format="00000000-A" data-reverse="true">
                        @error('dni')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="name">Nombre : <span class="text-danger">*</span></label>
                        <input type="text"  wire:model.lazy="name" class="form-control" placeholder="Ingrese un nombre">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="phone">Teléfono : <span class="text-danger">*</span></label>
                        <input type="text"  wire:model.lazy="phone" class="form-control" placeholder="Ingrese un teléfono"
                        data-toggle="input-mask" data-mask-format="(+56) 0 00000000">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email : <span class="text-danger">*</span></label>
                        <input type="text"  wire:model.lazy="email" class="form-control" placeholder="Ingrese un email">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="profile">Asignar un Role : <span class="text-danger">*</span></label>
                        <select wire:model="profile" class="form-control">
                            <option value="Seleccione un role" selected>Seleccione un role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('profile')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="password">Password : <span class="text-danger">*</span></label>
                        <input type="password"  wire:model.lazy="password" class="form-control" placeholder="Ingrese un password">
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="image">Imagen :</label>
                        <input type="file"  wire:model.lazy="image" class="form-control">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid img-thumbnail" style="max-height: 100px;">
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"  wire:click.prevent="resetUI()" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancelar</button>
                @if ($selected_id < 1)
                    <button type="button"  wire:click.prevent="Store()" class="btn btn-primary waves-effect waves-light close-modal">Guardar Registros</button>
                @else
                    <button type="button"  wire:click.prevent="Update()" class="btn btn-info waves-effect waves-light close-modal">Actualizar Registros</button>
                @endif
            </div>
        </div>
    </div>
</div>