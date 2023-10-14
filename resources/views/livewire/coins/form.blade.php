<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $componentName }}</b> | {{ $selected_id > 0 ? 'Editar' : 'Crear' }} <span class="text-warning" style="font-size: 12px;" wire:loading>&nbsp; Cargando...</span></h5>
                <button type="button"  wire:click.prevent="resetUI()" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label for="barcode">Tipo moneda: <span class="text-danger">*</span> </label>
                            <select wire:model="type" class="form-control">
                                <option value="Seleccione..." disabled>Seleccione...</option>
                                @foreach (App\Models\Coin::TYPE as $type)
                                    <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            @error('type')<span class="text-danger er">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label for="name">Valor: <span class="text-danger">*</span> </label>
                            <input type="number" wire:model.lazy="value" class="form-control" 
                            placeholder="0">
                            @error('value')<span class="text-danger er">{{ $message }}</span>@enderror
                        </div>
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
