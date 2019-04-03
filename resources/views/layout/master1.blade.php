
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>NAN RESERVATION</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{asset('assetes/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assetes/plugins/components/horizontal-timeline/css/horizontal-timeline.css')}}" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="{{asset('assetes/plugins/components/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assetes/plugins/components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assetes/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="{{asset('assetes/plugins/components/icheck/skins/all.css')}}" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
    <link href="{{asset('assetes/css/animate.css')}}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{asset('assetes/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assetes/css/seconds.css')}}" rel="stylesheet">

    <link href="{{asset('assetes/plugins/components/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">

    <link href="{{asset('assetes/plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- ===== Color CSS ===== -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar fix-header">
<!-- ===== Main-Wrapper ===== -->
<div id="wrapper">
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- ===== Top-Navigation ===== -->
@include('include.topbar')
<!-- ===== Top-Navigation-End ===== -->
    <!-- ===== Left-Sidebar ===== -->
@include('include.sidebar')
<!-- ===== Left-Sidebar-End ===== -->
    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper">
        <!-- ===== Page-Container ===== -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- ===== Page-Container-End ===== -->
        <footer class="footer t-a-c">
            © 2019 Nan reservation
        </footer>
    </div>
    <!-- ===== Page-Content-End ===== -->
</div>
<!-- ===== Main-Wrapper-End ===== -->
<!-- ==============================
    Required JS Files
=============================== -->
<!-- ===== jQuery ===== -->
<script src="{{asset('assetes/plugins/components/jquery/dist/jquery.min.js')}}"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="{{asset('assetes/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="{{asset('assetes/js/jquery.slimscroll.js')}}"></script>
@yield('script')
<!-- ===== Wave Effects JavaScript ===== -->
<script src="{{asset('assetes/js/waves.js')}}"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="{{asset('assetes/js/sidebarmenu.js')}}"></script>
<!-- ===== Custom JavaScript ===== -->
<script src="{{asset('assetes/plugins/components/icheck/icheck.min.js')}}"></script>
<script src="{{asset('assetes/plugins/components/icheck/icheck.init.js')}}"></script>
<script src="{{asset('assetes/js/custom.js')}}"></script>
<script src="{{asset('assetes/plugins/components/horizontal-timeline/js/horizontal-timeline.js')}}"></script>
<link href="{{asset('assetes/plugins/components/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
<link href="{{asset('assetes/plugins/components/jquery-asColorPicker-master/css/asColorPicker.css')}}" rel="stylesheet">
<link href="{{asset('assetes/plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assetes/plugins/components/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('assetes/plugins/components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<!-- ===== Plugin JS ===== -->
<script src="{{asset('assetes/plugins/components/raphael/raphael-min.js')}}"></script>
<script src="{{asset('assetes/plugins/components/morrisjs/morris.js')}}"></script>
<script src="{{asset('assetes/plugins/components/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{asset('assetes/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('assetes/js/db4.js')}}"></script>

<!-- ===== Style Switcher JS ===== -->
<script src="{{asset('assetes/plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>

<script src="{{asset('assetes/plugins/components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assetes/plugins/components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
<script src="{{asset('assetes/plugins/components/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('assetes/plugins/components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="{{asset('assetes/plugins/components/jquery-asColorPicker-master/libs/jquery-asColor.js')}}"></script>
<script src="{{asset('assetes/plugins/components/jquery-asColorPicker-master/libs/jquery-asGradient.js')}}"></script>
<script src="{{asset('assetes/plugins/components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('assetes/plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('assetes/plugins/components/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assetes/plugins/components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script>
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    jQuery('#datepicker-autocloses').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'DD/MM/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'DD/MM/YYYY',
        minDate: '01/01/2019',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
</script>


<script>
    $(function() {
        $('#myTable').DataTable();

        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>

</body>

</html>























