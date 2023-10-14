<div class="card">
    <div class="card-body">
         <h5 class="mt-0 mb-3 header-title text-center">Denominaciones</h5>

         <div class="container">
               <div class="row">
                   @foreach ($coins as $de)
                       <div class="col-sm-4 mt-2">
                           <button wire:click.prevent="ACash({{ $de->value }})" class="btn btn-dark btn-block">
                               {{ $de->value > 0 ? '$ ' . number_format($de->value, 0, ",", ".") : 'Exacto' }}
                           </button>
                       </div>
                   @endforeach
               </div>
         </div>
         <div class="container">
              <div class="input-group mt-3 mb-3">
                   <div class="input-group-prepend">
                        <span class="input-group-text" style="background: #3B3F5C; color: white"><small>Efectivo</small></span>
                   </div>
                   <input type="number" id="cash" 
                    wire:model="efectivo" 
                    wire:keydown.enter="saveSale"
                    class="form-control text-center"
                    value="{{ $efectivo }}">
                   <div class="input-group-append">
                        <span wire:click="$set('efectivo', 0)" class="input-group-text" style="background: #3B3F5C; color: white">
                            <i class="fas fa-backspace"></i>
                        </span>
                   </div>
              </div>

              <h6 class="text-muted">Cambio: $ {{ number_format($change, 0, ",", ".") }}</h6>
                     
              <div class="row mt-3">
                   <div class="col-6">
                        @if ($total > 0)
                            <button onclick="Confirm('', 'clearCart', '¿Seguro de eliminar la venta.?')" 
                                class="btn btn-dark">
                                &nbsp;&nbsp; CANCELAR &nbsp;&nbsp;
                            </button>
                        @endif                                        
                    </div>
                    <div class="col-6">
                        @if ($efectivo >= $total && $total > 0)
                            <button wire:click.prevent="saveSale" 
                                class="btn btn-primary btn-md btn-block float-end">
                                GUARDAR
                            </button>
                        @endif                                        
                    </div>
              </div>
         </div>
    </div>
</div>