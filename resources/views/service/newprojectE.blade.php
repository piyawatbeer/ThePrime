@extends('layouts.app') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-folder"></i>
            <span>
                งานที่อยู่ระหว่างรอการรังวัด
            </span></li>
    </ol> @foreach ($service as $services)
    @endforeach
    <form id="saveForm3" method="post" action="/service/update/{{$services->service_id}}" autocomplete="off">
        {{ csrf_field() }}
        <div class="card mb-3">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-2 text-left align-self-center">


                        <i class="fas fa-edit"></i> แก้ไขข้อมูล
                    </div>
                    <div class="col-md-2 text-right align-self-center">
                        <label for="part"><b>บริการ :</b>
                            <span class="text-danger">*</span>
                        </label>
                    </div>
                    <div class="col-md-6 text-left">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <select name="template" id="template" class="form-control" required>

                                {{-- <option value="">
           เลือกบริการ
        </option> --}}

                                @foreach ($work as $works)
                                <option value="{{$works->id}}" @if($works->id==$services->work_id) selected @endif>
                                    {{$works->workname}}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 text-left">
                    </div>
                </div>
            </div>


            <input type="hidden" name="id" value="">

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="namec"><b>ชื่อลูกค้า :</b>
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="namec" value="{{$services->namec}}" id="namec" class="form-control"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="idcardc"><b>เลขประจำตัว :</b>
                        
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="idcardc" minlength="13" maxlength="13"
                                onkeypress="preventNonNumericalInput(event)" value="{{$services->idcardc}}" id="idcardc"
                                class="form-control" autocomplete="off" >
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="addressc"><b>ที่อยู่ :</b>
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <textarea class="form-control" name="addressc" autocomplete="off" id="addressc" rows="4"
                                required>{{$services->addressc}}</textarea>

                        </div>
                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="telc"><b>โทรศัพท์ :</b>
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="telc" id="telc" value="{{$services->telc}}" class="form-control"
                                autocomplete="off" required>
                        </div>
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="emailc"><b>E-mail :</b>
                            <span class="text-danger"></span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="emailc" name="emailc" value="{{$services->emailc}}" id="emailc"
                                class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="locationc"><b>สถานที่ URL :</b>
                            <span class="text-danger"></span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="locationc" value="{{$services->locationc}}" id="locationc"
                                class="form-control" autocomplete="off">
                        </div>
                    </div>

                </div>
               
                {{-- endcard --}}
            </div>




            <div class="form-row">
                <div class="form-group col-sm-12 text-center">
                    <a href="{{ url('service/survey/') }}"> <button type="button" class="btn btn-danger"
                            data-dismiss="modal"><i class="fas fa-arrow-left"></i> ย้อนกลับ</button></a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                </div>
            </div>
    </form>

</div>


{{-- ajax model --}}
@include('layouts.modal')

@endsection @section('script')
<script>
    function preventNonNumericalInput(e) {
e = e || window.event;
var charCode = (typeof e.which == "undefined") ? e.keyCode : e.which;
var charStr = String.fromCharCode(charCode);

if (!charStr.match(/^[0-9]+$/))
e.preventDefault();
}
</script>
@endsection