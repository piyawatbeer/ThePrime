<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
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

{{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link href="{{ asset('font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/select2-bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet" type="text/css" />
{{-- <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" /> --}}
<!-- BEGIN CSS for this page -->

<!-- END CSS for this page -->

@yield('style')

<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
        var APP_LINK = {!! json_encode(Storage::url('/')) !!}
        var APP_USERID = {!! json_encode(Auth::id()) !!}
</script>
</head>

<body id="page-top">

    <div id="main">

        <!-- top bar navigation -->


        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

            <a class="navbar-brand mr-1" href="{{ route('home') }}">The Prime Real Estate</a>



            <!-- Navbar Search -->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            </div>

            <!-- Navbar -->

            <ul class="navbar-nav ml-auto ml-md-0">

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i
                            class="fas fa-user-circle fa-fw"></i><?php $name=explode(" ",Auth::user()->name);  echo$name[0];?><i
                            class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" title="ข้อมูลส่วนตัว" data-modal-name="ajaxModal"
                            href="{{url('profile/')}}"><i class="fas fa-id-card-alt"></i>
                            ข้อมูลส่วนตัว</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" title="ออกจากระบบ" href="#" onclick="event.preventDefault();
                     
       // var name = $(this).data('name');
        var callback = function () {
           window.location.replace('{{ route('logout') }}');   
        }
        confirmBox('ออกจากระบบ ', callback);
                   
                                ">
                            <i class="fas fa-sign-out-alt"></i> {{ __('ออกจากระบบ') }}
                        </a>


                    </div>
                </li>
            </ul>
            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <!-- End Navigation -->
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Left Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white" title="หน้าหลัก" href="{{ route('home') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>หน้าหลัก</span>
                    </a>
                </li>
                @if(strtolower(Auth::user()->user_type) === 'admin')
                <li class="nav-item">
                    <a class="nav-link text-white" title="ข้อมูลสมาชิก" href="{{ url('/user') }}">
                        <i class="fas fa-users"></i>
                        <span>ข้อมูลสมาชิก</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="ข้อมูลบริษัท" href="{{ url('/company') }}">
                        <i class="fas fa-user-secret"></i>
                        <span>ข้อมูลบริษัท</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="ข้อมูลธนาคาร" href="{{ url('/bank') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>ข้อมูลธนาคาร</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" title="ข้อมูล BOQ" href="#" id="pagesDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-building"></i>
                        <span>ข้อมูล BOQ</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        {{-- <h6 class="dropdown-header">Login Screens:</h6> --}}
                        <a class="dropdown-item" title="หมวดย่อย" href="{{ url('/categorysub') }}">-หมวดย่อย</a>
                        <a class="dropdown-item" title="ประเภท" href="{{ url('/typesub') }}">-ประเภท</a>
                        {{-- vb --}}
                        <a class="dropdown-item" title="ราคา BOQ" href="{{ url('/boq') }}">-ราคา BOQ</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" title="ข้อมูลบริการ Prime" href="#"
                        id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>บริการของ Prime</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" title="หมวดย่อย" href="{{ url('/work') }}">-สร้างหมวดหมู่</a>
                        <a class="dropdown-item" title="หมวดย่อย" href="{{ url('/options') }}">-Template</a>
                        {{-- @foreach($works as $work)
                        <a class="dropdown-item" title="หมวดย่อย" href="{{ url('/work/'.$work->id) }}">-{{$work->workname}}</a>


                        @endforeach --}}
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" title="สร้างงานใหม่" href="{{ url('/service') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> สร้างงานใหม่/โปรเจคใหม่</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่อยู่ระหว่างรอการรังวัด"
                        href="{{ url('/service/survey/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่อยู่ระหว่างรอการรังวัด</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่อยู่ระหว่างรอการรังวัด"
                        href="{{ url('/service/surveysend/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่อยู่ระหว่างส่งงานรังวัด</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่อยู่ระหว่างรอมัดจำ"
                        href="{{ url('/service/pledge/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่อยู่ระหว่างรอมัดจำ</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่อยู่ระหว่างออกแบบ" href="{{ url('/service/design/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่อยู่ระหว่างออกแบบ</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่อยู่ระหว่างรอเสนอราคา"
                        href="{{ url('/service/waitprice/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่อยู่ระหว่างรอเสนอราคา</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่อยู่ระหว่างเสนอราคาก่อสร้าง"
                        href="{{ url('/service/waitbuild/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่อยู่ระหว่างเสนอราคาก่อสร้าง</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่อยู่ระหว่างก่อสร้าง"
                        href="{{ url('/service/build/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่อยู่ระหว่างก่อสร้าง</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่อยู่ระหว่างประกัน"
                        href="{{ url('/service/garuntee/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่อยู่ระหว่างประกัน</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="งานที่จบแล้ว" href="{{ url('/service/endproject/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> งานที่จบแล้ว</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="ข้อมูลงานทั้งหมด" href="{{ url('/service/allproject/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> ข้อมูลงานทั้งหมด</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" title="ภาพรวมงานที่กำลังดำเนินงาน"
                        href="{{ url('/service/working/') }}">
                        {{-- <i class="fas fa-users"></i> --}}
                        <span><i class="fas fa-folder"></i> ภาพรวมงานที่กำลังดำเนินงาน</span></a>
                </li>
                @endif
            </ul>
            <!-- End Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">



                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span><strong>Copyright © The Prime Real Estate 2019</strong>
                                <div style="padding:5px;"> <strong>Power By:</strong> <a
                                        href="https://www.facebook.com/piyawatbeer" target="_blank">Power Dep
                                        Innovative.</a></div>
                            </span>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- End of Content Wrapper -->

        </div>
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
<script src="{{ URL::asset('js/custom.min.js') }}"></script>
<!-- BEGIN Java Script for this page -->

<!-- END Java Script for this page -->

@yield('script')



</html>