<script>
    var listener = new window.keypress.Listener();

    listener.simple_combo("f9", function (){
        livewire.emit('saveSale')
    })

    listener.simple_combo("f8", function (){
        document.getElementById('cash').value = ''
        document.getElementById('cash').focus()
        document.getElementById('hiddenTotal').value
    })

    listener.simple_combo("F4", function (){
        var total = parseFloat(document.getElementById('hiddenTotal').value)
        if (total > 0) {
            Confirm(0, 'clearCart', '¿Seguro de eliminar la venta?')
        } else {
            noty('Agrega productos a la venta')
        }
    })
</script>