<!-- Required Jquery -->
<!-- General JS Scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<!-- JS Libraies -->
{{-- <script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script> --}}
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{-- <script src="../files/bower_components/jquery/js/jquery.min.js"></script>
<script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script src="../files/bower_components/popper.js/js/popper.min.js"></script>
<script src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<script src="../files/assets/pages/widget/excanvas.js"></script>
<!-- jquery slimscroll js -->
<script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script src="../files/bower_components/modernizr/js/modernizr.js"></script>
<!-- slimscroll js -->
<script src="../files/assets/js/SmoothScroll.js"></script>
<script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Chart js -->
<script src="../files/bower_components/chart.js/js/Chart.js"></script>
<script src="../files/assets/pages/widget/amchart/amcharts.js"></script>
<script src="../files/assets/pages/widget/amchart/serial.js"></script>
<script src="../files/assets/pages/widget/amchart/light.js"></script>
<!-- menu js -->
<script src="../files/assets/js/pcoded.min.js"></script>
<script src="../files/assets/js/navbar-image/vertical-layout.min.js"></script>
<!-- custom js -->
{{-- <script  src="../files/assets/pages/dashboard/custom-dashboard.min.js"></script>
<script src="../files/assets/pages/dashboard/custom-dashboard.js"></script>
<script src="../files/assets/js/script.js"></script> --}}
<script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>
<!--------data Table Script ----->
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> --}}
<script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/page/sweetalert.js') }}"></script>
{{-- <script src="{{asset('assets/bundles/cleave-js/dist/cleave.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/bundles/cleave-js/dist/addons/cleave-phone.us.js')}}"></script> --}}
<script src="{{ asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
<script src="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
{{-- <script src="{{asset('assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script> --}}
<script src="{{ asset('assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>

<!-- Page Specific JS File -->
{{-- <script src="{{asset('assets/js/page/widget-chart.js')}}"></script> --}}
<script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>

<script>
    window.config = {
        REAL_VALIDATION_TOKEN: "{{ env('REAL_VALIDATION_TOKEN') }}",
        // Add more environment variables as needed
    };

    $(document).ready(function() {

        $('#data_table').DataTable({
            // dom: 'Bfrltip',
            "order": [],
            "pagingType": "full_numbers", // Add pagination controls
            "lengthMenu": [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "Show All"]
            ]
        });
    });
</script>
<script>
    $('.alert button').click(function() {
        setTimeout(() => {
            $('.alert').remove();
        }, 1000);
    })
</script>
<!-- jQuery -->

<!-- Bootstrap JS -->

@yield('custom_script')
