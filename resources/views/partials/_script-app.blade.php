<!-- base:js -->
<script src="{{ asset('celestial/template') }}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('celestial/template') }}/js/off-canvas.js"></script>
<script src="{{ asset('celestial/template') }}/js/hoverable-collapse.js"></script>
<script src="{{ asset('celestial/template') }}/js/template.js"></script>
<script src="{{ asset('celestial/template') }}/js/settings.js"></script>
<script src="{{ asset('celestial/template') }}/js/todolist.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{ asset('celestial/template') }}/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{ asset('celestial/template') }}/js/chart.js"></script>
<!-- End custom js for this page-->
@if (Session::get('text'))
<script>
    Swal.fire({
        title: `{{ Session::get('title') }}`,
        icon: `{{ Session::get('icon') }}`,
        text: `{{ Session::get('text') }}`
    })
</script>
@endif
