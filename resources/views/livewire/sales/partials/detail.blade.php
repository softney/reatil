<div class="card">
    <div class="card-body">
        <livewire:search>
       @if ($total > 0)           

           <div class="table-responsive tblscroll" style="overflow: hidden;">
               <table class="table table-bordered table-hover mb-3">
                   <thead class="thead-dark">
                       <tr>
                           <th class="text-left">Descripción</th>
                           <th class="text-end">Precio</th>
                           <th width="13%" class="text-center">Cant.</th>
                           <th class="text-end">Importe</th>
                           <th width="100px" class="text-center">Acciones</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($cart as $item)
                           <tr>
                               <td>{{ $item->name }}</td>
                               <td class="text-end">$ {{ number_format($item->price, 0, ",", ".") }}</td>
                               <td>
                                   <input type="number" id="r{{ $item->id }}" 
                                   wire:change="updateQty({{ $item->id }}, $('#r' + {{ $item->id }}).val() )"
                                   style="font-size: 12px!important" class="form-control form-control-sm text-center" 
                                   value="{{ $item->quantity }}">
                               </td>
                               <td class="text-end">
                                   $ {{ number_format($item->price * $item->quantity, 0, ",", ".") }}
                               </td>
                               <td class="text-center">
                                   <a href="javascript:void(0);" wire:click.prevent="decreaseQty({{ $item->id }})"
                                       class="mr-2">
                                       <i class="fas fa-minus-circle text-primary font-16"></i>
                                   </a>

                                   <a href="javascript:void(0);" wire:click.prevent="increaseQty({{ $item->id }})"
                                       class="mr-2">
                                       <i class="fas fa-plus-circle text-primary font-16"></i>
                                   </a>

                                   <a href="javascript:void(0);" onclick="Confirm('{{ $item->id }}', 'removeItem', '¿Confirmas eliminar el registro.?')">
                                       <i class="fas fa-trash-alt text-danger font-16"></i>
                                   </a>
                               </td>
                           </tr>
                       @endforeach                            
                   </tbody>
               </table>
           </div>
       @else			
           <h5 class="text-center text-muted">Agrega productos a la venta.</h5>
       @endif

       <div wire:loading.inline wire:target="saveSale">
           <h4 class="text-center text-danger">Procesando venta...</h4>
       </div>

   </div>
</div>
