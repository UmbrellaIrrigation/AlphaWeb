<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ URL::asset('js/app.js') }}"></script>
<script>
    var createModal = $('#createModal').modal('hide');
    if ( typeof createError == 'boolean' && createError == true ) {
        createModal.modal('show');
    }
</script>
