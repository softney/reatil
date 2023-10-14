<div wire:ignore.self class="modal fade bd-example-modal-lg" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $componentName }}</b> | {{ $selected_id > 0 ? 'Editar' : 'Crear' }} <span class="text-warning" style="font-size: 12px;" wire:loading>&nbsp; Cargando...</span></h5>
                <button type="button"  wire:click.prevent="resetUI()" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
