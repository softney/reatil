<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/dropify.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('assets/js/keypress.js') }}"></script>
<script src="{{ asset('assets/js/onscan.js') }}"></script>
<script src="{{ asset("assets/plugins/jquery-mask-plugin/jquery.mask.min.js") }}"></script>
<script src="{{ asset('assets/plugins/nicescroll/nicescroll.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notification/snackbar/snackbar.min.js') }}"></script>
<script src="{{ asset("assets/js/pages/form-masks.init.js") }}"></script>

<script src="{{ asset('assets/js/keypress.js') }}"></script>
<script src="{{ asset('assets/js/onscan.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	$(function () {
        $('.dropify').dropify();
	});
</script>
<script>
    function noty(msg, option = 1) {
        Snackbar.show({
            text: msg.toUpperCase(),
            actionText: 'X',
            actionTextColor: '#FFFFFF',
            bacgroundColor: option == 1 ? '#2DDAB5' : '#E7515A',
            pos: 'top-right',
            duration: 3000
        });
    }
</script>

@yield('scripts')
