<div class="card">
    <div class="card-body">
         <h5 class="mt-0 header-title text-center">Resumen de Venta</h5>
         <div>
              <h5><b>Total: $ {{ number_format($total, 0, ",", ".") }}</b></h5>
              <input type="hidden" id="hiddenTotal" value="{{ $total }}">
         </div>
         <div>
              <h6 class="mt-3">Artículos: {{ number_format($itemsQuantity, 0, ",", ".") }}</h6>
         </div>
    </div>
</div>