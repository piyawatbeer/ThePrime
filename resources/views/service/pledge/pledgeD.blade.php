@extends('layouts.app') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-folder"></i>
            <span>
                งานที่อยู่ระหว่างรอมัดจำ
            </span></li>
    </ol> @foreach ($service as $services)
    @endforeach
    @foreach($pledge as $pledges)
    @endforeach
   
    <form id="saveForm" method="post" action="/service/pledgeslipsdel/{{$services->service_id}}" autocomplete="off"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card mb-3">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left align-self-center">


                        <i class="fas fa-folder"></i> <b>ข้อมูลงาน</b> #<?php 
                    $num='';
                    for($i=3;$i>count((array)$services->service_code);$i--){
                        $num=$num.'0';
                    }
                    echo $num.$services->service_code;
                    ?> {{$services->workname}}

                    </div>
                    <div class="col-md-6 text-right align-self-center"> 
                        {{-- @if($template)
                        @else <a href="#" data-href="{{ url('service/templatef/'.$services->service_id.'') }}"
                            data-modal-name="ajaxModal" role="button" class="btn btn-success btn-create">
                            <i class="fas fa-plus-circle"></i> เพิ่มใบเสนอราคา
                        </a>
                      
                        @endif  --}}
                        @if(empty($pledges->pledge_id)) <a href="#"
                            data-href="{{ url('service/pledgeslips/'.$services->service_id.'') }}"
                            data-modal-name="ajaxModal" role="button" class="btn btn-success btn-create">
                            <i class="fas fa-plus-circle"></i> เพิ่มใบเสนอราคามัดจำ
                        </a>
                        @endif
                       

                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">


                            {{-- <a href="{{ url('categorysub/print') }}" target="blank" data-modal-name="ajaxModal"
                            role="button"
                            class="btn btn-primary btnprn"> --}}
                            <i class="fas fa-print"></i> ปริ้น

                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/service/surveyprint/{{$services->service_id}}" target="blank" title="พิมพ์ใบรังวัด"><i
                                    class="fas fa-print"></i> พิมพ์ใบรังวัด</a>
                           @if(!empty($pledges->pledge_id)) <a class="dropdown-item" href="/service/pledgeprint/{{$services->service_id}}"
                                target="blank"><i class="fas fa-print"></i> พิมพ์ใบเสนอราคามัดจำ</a>@endif
                            {{-- <a class="dropdown-item" href="#" target="blank">Link 3</a> --}}
                            {{-- @if($template) <a class="dropdown-item" href="/service/templateprint/{{$services->service_id}}" target="blank"><i
                                    class="fas fa-print"></i> พิมพ์ใบเสนอราคาลูกค้า</a>
                           <a class="dropdown-item" href="/service/templateprints/{{$services->service_id}}" target="blank"><i
                                    class="fas fa-print"></i> พิมพ์ใบเสนอราคา Prime</a> @endif --}}
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
                                    class="fas fa-map-marker-alt   btn-outline-primary btn-sm"></i></a>@else - @endif

                        </label>

                    </div>

                </div>
               

                <div class="form-row">
                    <div class="form-group  col-sm-6">
                        <label for="detailc"><b>ใบเสนอราคามัดจำ :</b> @if(!empty($pledges->pledge_id))
                            <?php if($pledges->pledge_type=="price"){echo number_format($pledges->pledge_total,2)." บาท";}
                                                    else{ echo $pledges->pledge_persent." % ของจำนวนเงิน ".number_format($pledges->pledge_price,2)." เป็นเงิน ".number_format($pledges->pledge_total,2)." บาท";}?>
                            <a href="" data-href="/service/pledgeslipsdel/{{$services->service_id}}" data-id="{{$services->service_id}}"
                                data-name="ใบเสนอราคามัดจำ" role="button" class="btn btn-outline-danger btn-sm btn-delete" title="ลบ"><i
                                    class="fa fa-trash"></i></a>
                            <a href="/service/pledgeprint/{{$services->service_id}}" class="btn btn-outline-primary btn-sm" title="พิมพ์"
                                target="_blank"><i class="fas fa-print"></i></a>
                            @endif
                        
                        
                        </label>

                        {{-- <label for="detailc"><b>ใบเสนอราคา :</b> 
                            @if($template) @foreach($template as $templates)
                            @endforeach
                            <a href="/service/templatedata/{{$services->service_id}}" class="btn btn-outline-primary btn-sm">ใบเสนอราคา</a> --}}
                            {{-- <a href="" data-href="/service/pledgeslipsdel/{{$services->service_id}}" data-id="{{$services->service_id}}"
                                data-name="ใบเสนอราคามัดจำ" role="button" class="btn btn-outline-danger btn-sm btn-delete" title="ลบ"><i
                                    class="fa fa-trash"></i></a> --}}
                            {{-- <a href="/service/pledgeprint/{{$services->service_id}}" class="btn btn-outline-primary btn-sm" title="พิมพ์"
                                target="_blank"><i class="fas fa-print"></i></a> --}}
                            {{-- @endif --}}
                    
                    
                        {{-- </label> --}}
                    
                    </div>
                    <div class="form-group  col-sm-6">
                        

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

        <div class="accordion" id="accordionExample">
        
            <div class="card z-depth-0 bordered">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="false" aria-controls="collapseOne">
                            - รายละเอียด <i class="fas fa-sort-down"></i>
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
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
                                <label for="meetdate"><b>วันที่นัด :</b>
                                    <?php  $date =  date('d-m-Y', strtotime($services->meetdate));
                                                            echo $date; ?>
        
                                </label>
        
                            </div>
        
        
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                        
                                <label for="detailc"><b>ผู้รับงานรังวัด :</b>
                                    @foreach ($user as $users)
                                    @if($services->surveyker==$users->id) {{$users->name}} @endif
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
                            </div>
                        
                        
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
        
                                <label for="detailc"><b>ข้อมูลรังวัด :</b>
        
                                </label> {{ $services->surveydetail }}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="meetdate"><b>ไฟล์รังวัด :</b> @if($services->surveypic)
                                    {{-- <img src="{{url('/storage'.$services->surveypic.'')}}" width="50px"
                                    class="img-thumbnail"> --}}
                                    <a href="{{ asset('/') }}storage{{$services->surveypic}}" target="_blank"
                                        title="รูปภาพ">รูปรังวัด <i class="fas fa-image   btn-outline-primary btn-sm"></i></a>
                                    @endif
                                </label>
        
                            </div>
        
        
                        </div>
        
                        {{-- <div class="form-row">
                                        <div class="form-group  col-sm-12">
                                            <label for="detailc"><b>ใบเสนอราคามัดจำ :</b> @if(!empty($pledges->pledge_id)) --}}
                        <?php //if($pledges->pledge_type=="price"){echo number_format($pledges->pledge_total,2)." บาท";}
                                                              //  else{ echo $pledges->pledge_persent." % ของจำนวนเงิน ".number_format($pledges->pledge_price,2)." เป็นเงิน ".number_format($pledges->pledge_total,2)." บาท";}?>
        
                        {{-- <a href="/service/pledgeprint/{{$services->service_id}}"
                        class="btn btn-outline-primary btn-sm" title="พิมพ์" target="_blank"><i class="fas fa-print"></i></a>
                        --}}
                        {{-- @endif --}}
        
                        {{-- 
                                            </label>
        
                                        </div> --}}
        
        
        
                        {{-- </div>  --}}
                    </div>
                </div>
            </div>
        </div>

        </div>
        <div class="form-row">
            <div class="form-group col-sm-12 text-center">
                <a href="{{ url('service/pledge/') }}"> <button type="button" class="btn btn-danger"
                        data-dismiss="modal"><i class="fas fa-arrow-left"></i> ย้อนกลับ</button></a>
                {{-- <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button> --}}
            </div>
        </div>

    </form>


    {{-- ajax model --}}
    @include('layouts.modal')

    @endsection @section('script')
    <script>
        $(document).ready(function () {
     $('#ajaxModal').on('shown.bs.modal', function (e) {
    $('#saveForm').validate({
    submitHandler: function (form) {
    var id = $('input[name=id]').val();
    var url = APP_URL + 'service/pledgeslips';
    saveForm(id, url, table);
    },
    messages: {},
    errorElement: 'span',
    errorPlacement: function (error, element) {
    error.addClass("error-block");
    error.addClass("invalid-feedback");
    if (element.prop("type") === "checkbox") {
    error.insertAfter(element.parent("label"));
    } else if (element.parent('.input-group').length) {
    error.insertAfter(element.parent()); /* radio checkbox? */
    } else if (element.hasClass('select2')) {
    error.insertAfter(element.next('span')); /* select2 */
    } else {
    error.insertAfter(element);
    }
    },
    highlight: function (element, errorClass, validClass) {
    $(element).parents('.form-group').addClass('has-error').removeClass('has-success');
    $(element).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: function (element, errorClass, validClass) {
    $(element).parents('.form-group').addClass('has-success').removeClass('has-error');
    $(element).addClass('is-valid').removeClass('is-invalid');
    }
    });
    });


    $('body').on('click', '.btn-delete', function (e) {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    e.preventDefault();
    var token = $("meta[name='csrf-token']").attr("content");
    var id = $(this).data('id');
    var url = APP_URL+$(this).data('href');
    var name = $(this).data('name');
    
   
    var callback = function () {
        
    $.ajax(
    {
    url: url,
    type: 'delete',
    data: {
    "id": id,
    "_token": token,
    } ,success: function (){
        showBox('ลบข้อมูลเรียบร้อย', 'success');
        setTimeout(function()
        {
        location.reload(); //Refresh page
        }, 1000);
           
        }
    });
    }
    confirmBox('ลบข้อมูล ' + name, callback);
    
});
        });
function printpdf(url){
 var myWindows=window.open(url, '_blank');
myWindows.print();
}
    </script>

    @endsection