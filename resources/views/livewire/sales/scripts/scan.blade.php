<script>
    try {
        onScan.attachTo(document, {
            suffixKeyCodes: [13], // tecla enter esperada al final de un escaneo
            onScan: function(barcode) { // Alternativa a document.addEventListener('scan')
                console.log(barcode)
                window.livewire.emit('scan-code', barcode)
            },

            onScanError: function(e) {
                console.log(e)
            }
        })

        console.log('Scanner ready')

    } catch (e) {
        console.log('Error de lectura', e)
    }
</script>