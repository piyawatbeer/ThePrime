@extends('layouts.app') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-folder"></i>
            <span>
                งานที่อยู่ระหว่างส่งงานรังวัด
            </span></li>
    </ol> @foreach ($service as $services)
    @endforeach
    <form id="saveForm3" method="post" action="/service/surveypic/{{$services->service_id}}" autocomplete="off"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card mb-3">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left align-self-center">


                        <i class="fas fa-folder"></i> <b>ข้อมูลงาน</b> #<?php 
                    $num='';
                    for($i=3;$i>$services->service_code;$i--){
                        $num=$num.'0';
                    }
                    echo $num.$services->service_code;
                    ?> {{$services->workname}}

                    </div>
                    <div class="col-md-6 text-right align-self-center">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">


                                {{-- <a href="{{ url('categorysub/print') }}" target="blank" data-modal-name="ajaxModal"
                                role="button"
                                class="btn btn-primary btnprn"> --}}
                                <i class="fas fa-print"></i> ปริ้น

                            </button>
                            <div class="dropdown-menu">
                               <a class="dropdown-item" href="/service/surveyprint/{{$services->service_id}}" target="blank" title="พิมพ์ใบรังวัด"><i
                                    class="fas fa-print"></i> พิมพ์ใบรังวัด</a>
    
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <input type="hidden" name="id" value="">

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="namec"><b>ชื่อลูกค้า :</b> {{ $services->namec}}

                        </label>

                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="idcardc"><b>เลขประจำตัว :</b> {{$services->idcardc}}

                        </label>

                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="addressc"><b>ที่อยู่ :</b> {{$services->addressc}}

                        </label>

                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="telc"><b>โทรศัพท์ :</b> {{$services->telc}}

                        </label>

                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="emailc"><b>E-mail :</b> {{$services->emailc}}

                        </label>

                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="locationc"><b>สถานที่ URL :</b> @if($services->locationc)<a
                                href="{{$services->locationc}}" target="_blank" title="สถานที่">สถานที่ลูกค้า <i
                                    class="fas fa-map-marker-alt  btn-outline-primary btn-sm"></i></a>@else - @endif

                        </label>

                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="detailc"><b>รายละเอียด :</b> {{$services->detailc}}

                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="detailc"><b>ผู้รับงาน :</b> {{$services->name}}

                        </label>

                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                      <label for="meetdate"><b>วันที่นัดเข้ารังวัด :</b>
                        @if($services->meetdate)
                        <?php  $date =  date('d-m-Y', strtotime($services->meetdate));?>
                        @else
                        <?php $date="";?>
                        @endif
                        {{$date}}
                    </label>
                    </div>


                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                
                        <label for="detailc"><b>ผู้รับงานรังวัด :</b>
                              @foreach ($user as $users)
                                @if($services->surveyker==$users->id)   {{$users->name}} @endif
                                @endforeach
                
                        </label>
                        
                              
                          
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                       
                       <label for="meetdate"><b>Dropbox URL :</b>@if($services->surveyurl)
                    {{-- <img src="{{url('/storage'.$services->surveypic.'')}}" width="50px"
                    class="img-thumbnail"> --}}
                    <a href="{{$services->surveyurl}}" target="_blank" title="รูปภาพ">รูป Dropbox <i
                            class="fas fa-image   btn-outline-primary btn-sm"></i></a>
                    @endif
                       
                    </label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="surveyurl" id="surveyurl" value="@if($services->surveyurl) {{$services->surveyurl}} @endif" class="form-control" autocomplete="off">
                    </div>
                    </div>
                
                
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">

                        <label for="detailc"><b>ข้อมูลรังวัด :</b>
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <textarea class="form-control" name="surveydetail" autocomplete="off" id="surveydetail"
                                rows="4"
                                required>@if($services->surveydetail) {{$services->surveydetail}} @endif</textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="meetdate"><b>แนบไฟล์ :</b>@if($services->surveypic)
                        {{-- <img src="{{url('/storage'.$services->surveypic.'')}}" width="50px"
                        class="img-thumbnail"> --}}
                        <a href="{{ asset('/') }}storage{{$services->surveypic}}" target="_blank" title="รูปภาพ">รูปรังวัด <i
                                class="fas fa-image   btn-outline-primary btn-sm"></i></a>
                        @endif
                            
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="file" name="surveypic" id="surveypic" class="form-control" autocomplete="off">
                        </div>
                        <br>
                        
                    </div>


                </div>
                {{-- endcard --}}
            </div>
            {{-- <div class="card-header">
            <div class="row">
                <div class="col-md-12 text-left align-self-center">
        
        
                    <b>ใบเสนอราคามัดจำ : </b> 
        
                </div>
        
        
            </div>
        </div>
        <div class="card-body">
        </div> --}}




        </div>
        <div class="form-row">
            <div class="form-group col-sm-12 text-center">
                {{-- <a href="{{ URL::previous() }}">  --}}
                 <a href="{{ url('service/surveysend/') }}">   
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fas fa-arrow-left"></i> ย้อนกลับ</button></a>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
            </div>
        </div>

    </form>

    {{-- ajax model --}}
    @include('layouts.modal')

    @endsection @section('script')
    <script>
        (function($) {
    $.fn.checkFileType = function(options) {
    var defaults = {
    allowedExtensions: [],
    success: function() {},
    error: function() {}
    };
    options = $.extend(defaults, options);
    
    return this.each(function() {
    
    $(this).on('change', function() {
    var value = $(this).val(),
    file = value.toLowerCase(),
    extension = file.substring(file.lastIndexOf('.') + 1);
    
    if ($.inArray(extension, options.allowedExtensions) == -1) {
    options.error();
    $(this).focus();
    } else {
    options.success();
    }
    
    });
    
    });
    };
    
    })(jQuery);
    
    $(function() {
    $('#surveypic').checkFileType({
    allowedExtensions: ['jpg', 'jpeg','png','pdf'],
    success: function() {
        if($('#surveypic')[0].files[0].size<=2000000){showBox('ไฟล์รูปถูกต้อง', 'success');}
        else{showBox('ไฟล์รูปขนาดใหญ่เกินไป', 'error');
        $('#surveypic').val('');}
    //showBox('ไฟล์รูปถูกต้อง', 'success');
    },
    error: function() {
        showBox('ไฟล์รูปไม่ถูกต้อง', 'error');
        $('#surveypic').val('');
    }
    });
    
    });
      function printpdf(url){
 var myWindows=window.open(url, '_blank');
myWindows.print();
}
    </script>
    @endsection