@extends('layouts.app')

@section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <span>
                <i class="fas fa-folder"></i> ภาพรวมของระบบ</span>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">

                    <div class="card text-white bg-primary o-hidden h-100">

                        <div class="card-body" style="min-height: 100px;">

                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas)
                                @if($datas->service_status=="การรังวัด") <button type="button" style="border: none;
                                                border-radius: 50%;
                          color: white;
                          padding: 1.5hv;
                          text-align: center;
                          text-decoration: none;
                          display: inline-block;
                          font-size: 2hv;
                          margin: 2px 1px;
                          cursor: pointer;" class="btn bg-danger">{{$datas->total}}</button> @endif @endforeach
                                <b>งานที่อยู่ระหว่างรอการรังวัด</b></div>
                        </div>
                        @if(Auth::user()->user_type=="admin")
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        
                           
                        </a>
                        @else
                        <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/survey/') }}">
                            <span class="float-left">ดูรายละเอียด</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                
                    <div class="card text-white bg-danger o-hidden h-100">
                
                        <div class="card-body" style="min-height: 100px;">
                
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas)
                                @if($datas->service_status=="ส่งงานรังวัด") <button type="button" style="border: none;
                                                                border-radius: 50%;
                                          color: white;
                                          padding: 1.5hv;
                                          text-align: center;
                                          text-decoration: none;
                                          display: inline-block;
                                          font-size: 2hv;
                                          margin: 2px 1px;
                                          cursor: pointer;" class="btn bg-danger">{{$datas->total}}</button> @endif @endforeach
                                <b>งานที่อยู่ระหว่าง<br>ส่งงานรังวัด</b></div>
                        </div>
                       @if(Auth::user()->user_type=="admin")
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        
                        
                        </a>
                        @else
                        <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/surveysend/') }}">
                            <span class="float-left">ดูรายละเอียด</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body" style="min-height: 100px;">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas) @if($datas->service_status=="มัดจำ")
                                <button type="button" style="border: none;
                                                                        border-radius: 50%;
                                                  color: white;
                                                  padding: 1.5hv;
                                                  text-align: center;
                                                  text-decoration: none;
                                                  display: inline-block;
                                                  font-size: 2hv;
                                                  margin: 2px 1px;
                                                  cursor: pointer;" class="btn bg-danger">{{$datas->total}} </button>
                                @endif @endforeach <b>งานที่อยู่ระหว่างรอมัดจำ</b></div>
                        </div>
                      @if(Auth::user()->user_type=="admin")
                    <a class="card-footer text-white clearfix small z-1" href="#">
                    
                    
                    </a>
                    @else
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/pledge/') }}">
                        <span class="float-left">ดูรายละเอียด</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    @endif
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body" style="min-height: 100px;">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas) @if($datas->service_status=="ออกแบบ") <button
                                    type="button" style="border: none;
                                                border-radius: 50%;
                          color: white;
                          padding: 1.5hv;
                          text-align: center;
                          text-decoration: none;
                          display: inline-block;
                          font-size: 2hv;
                          margin: 2px 1px;
                          cursor: pointer;" class="btn bg-danger">{{$datas->total}}</button>
                                @endif @endforeach <b>งานที่อยู่ระหว่างการออกแบบ</b></div>
                        </div>
                        @if(Auth::user()->user_type=="admin")
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        
                        
                        </a>
                        @else
                        <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/design/') }}">
                            <span class="float-left">ดูรายละเอียด</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
                
            </div>

            {{--    row 2 --}}
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-body" style="min-height: 100px;">
                            <div class="card-body-icon">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas) @if($datas->service_status=="รอเสนอราคา")
                                <button type="button" style="border: none;
                                                                                        border-radius: 50%;
                                                                  color: white;
                                                                  padding: 1.5hv;
                                                                  text-align: center;
                                                                  text-decoration: none;
                                                                  display: inline-block;
                                                                  font-size: 2hv;
                                                                  margin: 2px 1px;
                                                                  cursor: pointer;" class="btn bg-danger">{{$datas->total}}</button>
                                @endif @endforeach <b>งานที่อยู่ระหว่างรอเสนอราคา</b></div>
                        </div>
                       @if(Auth::user()->user_type=="admin")
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        
                        
                        </a>
                        @else
                        <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/waitprice/') }}">
                            <span class="float-left">ดูรายละเอียด</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white o-hidden h-100" style="background-color:mediumspringgreen;">
                        <div class="card-body" style="min-height: 100px;">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-life-ring"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas) @if($datas->service_status=="เสนอราคาก่อสร้าง")
                                <button type="button" style="border: none;
                                                                                                border-radius: 50%;
                                                                          color: white;
                                                                          padding: 1.5hv;
                                                                          text-align: center;
                                                                          text-decoration: none;
                                                                          display: inline-block;
                                                                          font-size: 2hv;
                                                                          margin: 2px 1px;
                                                                          cursor: pointer;"
                                    class="btn bg-danger">{{$datas->total}}</button>
                                @endif @endforeach <b>งานที่อยู่ระหว่างเสนอราคาก่อสร้าง</b></div>
                        </div>
                      @if(Auth::user()->user_type=="admin")
                    <a class="card-footer text-white clearfix small z-1" href="#">
                    
                    
                    </a>
                    @else
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/waitbuild/') }}">
                        <span class="float-left">ดูรายละเอียด</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    @endif
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white o-hidden h-100" style="background-color:mediumslateblue;">
                        <div class="card-body" style="min-height: 100px;">
                            <div class="card-body-icon">
                                <i class="fas fa-folder"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas) @if($datas->service_status=="ก่อสร้าง") <button
                                    type="button" style="border: none;
                                                                                                                        border-radius: 50%;
                                                                                                  color: white;
                                                                                                  padding: 1.5hv;
                                                                                                  text-align: center;
                                                                                                  text-decoration: none;
                                                                                                  display: inline-block;
                                                                                                  font-size: 2hv;
                                                                                                  margin: 2px 1px;
                                                                                                  cursor: pointer;"
                                    class="btn bg-danger">{{$datas->total}}</button>
                                @endif @endforeach <b> งานที่อยู่ระหว่างก่อสร้าง</b></div>
                        </div>
                     @if(Auth::user()->user_type=="admin")
                    <a class="card-footer text-white clearfix small z-1" href="#">
                    
                    
                    </a>
                    @else
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/build/') }}">
                        <span class="float-left">ดูรายละเอียด</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    @endif
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white o-hidden h-100" style="background-color:magenta;">
                        <div class="card-body" style="min-height: 100px;">
                            <div class="card-body-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas) @if($datas->service_status=="ประกัน") <button
                                    type="button"
                                    style="border: none;
                                                                                                                                                border-radius: 50%;
                                                                                                                          color: white;
                                                                                                                          padding: 1.5hv;
                                                                                                                          text-align: center;
                                                                                                                          text-decoration: none;
                                                                                                                          display: inline-block;
                                                                                                                          font-size: 2hv;
                                                                                                                          margin: 2px 1px;
                                                                                                                          cursor: pointer;"
                                    class="btn bg-danger">{{$datas->total}}</button>
                                @endif @endforeach <b> งานที่อยู่ระหว่างประกัน</b></div>
                        </div>
                       @if(Auth::user()->user_type=="admin")
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        
                        
                        </a>
                        @else
                        <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/garuntee/') }}">
                            <span class="float-left">ดูรายละเอียด</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-dark o-hidden h-100">
                        <div class="card-body" style="min-height: 100px;">
                            <div class="card-body-icon">
                                <i class="fas fa-child"></i>
                            </div>
                            <div class="mr-5">@foreach ($data as $datas) @if($datas->service_status=="จบแล้ว") <button
                                    type="button"
                                    style="border: none;                                                                                                                                       cursor: pointer;"
                                    class="btn bg-danger text-white">{{$datas->total}}</button>
                                @endif @endforeach <b> งานที่จบแล้ว</b></div>
                        </div>
                       @if(Auth::user()->user_type=="admin")
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        
                        
                        </a>
                        @else
                        <a class="card-footer text-white clearfix small z-1" href="{{ url('/service/endproject/') }}">
                            <span class="float-left">ดูรายละเอียด</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- endrow --}}
        </div>
    </div>
</div>
@endsection