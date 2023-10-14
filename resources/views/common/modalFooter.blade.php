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
