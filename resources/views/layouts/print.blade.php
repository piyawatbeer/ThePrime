<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="">
<meta name="author" content="">

<title>ระบบบริหารจัดการฐานข้อมูล The Prime Real Estate</title>
<link href="{{URL::asset('/img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon" />
<!-- Custom fonts for this template-->




<!-- Custom styles for this template-->
{{-- <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">

<!-- Switchery css -->
<link href="{{ asset('css/switchery.min.css') }}" rel="stylesheet" />

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/select2-bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
{{-- <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" /> --}}

<!-- Custom CSS -->
{{-- <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet" type="text/css" /> --}}
{{-- <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" /> --}}
<!-- BEGIN CSS for this page -->

<!-- END CSS for this page -->

@yield('style')
<style type="text/css">
    @media print {
        #Header, #Footer { display: none !important; }
        body {
            -webkit-print-color-adjust: exact;
        }
    }
</style>
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
        var APP_LINK = {!! json_encode(Storage::url('/')) !!}
        var APP_USERID = {!! json_encode(Auth::id()) !!}
</script>
</head>

<body >



    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- End of Page Wrapper -->
    <!-- END main -->
</body>

<script src="{{ URL::asset('js/vue.min.js') }}"></script>
<script src="{{ URL::asset('js/axios.min.js') }}"></script>
<script src="{{ URL::asset('js/modernizr.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/sb-admin.min.js') }}"></script>
<script src="{{ URL::asset('js/popper.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<script src="{{ URL::asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/messages_th.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
<script src="{{ URL::asset('js/select2.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ URL::asset('js/detect.js') }}"></script>
<script src="{{ URL::asset('js/fastclick.js') }}"></script>
<script src="{{ URL::asset('js/jquery.blockUI.js') }}"></script>
<script src="{{ URL::asset('js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ URL::asset('js/switchery.min.js') }}"></script>
<script src="{{ URL::asset('js/loadingoverlay.min.js') }}"></script>

<!-- App js -->
<script src="{{ URL::asset('js/pikeadmin.min.js') }}"></script>
{{-- <script src="{{ URL::asset('js/custom.min.js') }}"></script> --}}
<!-- BEGIN Java Script for this page -->

<!-- END Java Script for this page -->

@yield('script')



</html>