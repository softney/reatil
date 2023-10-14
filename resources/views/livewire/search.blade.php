<div>
    <div class="row">
        <div class="col-sm-12 col-lg-12 form group">
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <img src="{{ asset('assets/images/escáner-de-código-de-barras.png') }}" width="18">
                        
                    </span>
                </div>
                <input type="search" id="code"
                wire:keydown.enter.prevent="$emit('scan-code', $('#code').val())" 
                class="form-control" 
                placeholder="Código de Barras"
                autofocus>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        livewire.on('scan-code', action => {
            $('#code').val('')
        });
    })
</script>
