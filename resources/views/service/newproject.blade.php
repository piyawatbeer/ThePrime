@extends('layouts.app') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-folder"></i>
            <span>
                สร้างงานใหม่/โปรเจคใหม่
            </span></li>
    </ol>
    <form id="saveForm3" method="post" action="/service/add" autocomplete="off">
        {{ csrf_field() }}
        <div class="card mb-3">
            {{-- @foreach ($service as $services)
        @endforeach --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2 text-left align-self-center">


                        <i class="fas fa-plus-circle"></i> เพิ่มข้อมูล
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

                                <option value="">
                                    เลือกบริการ
                                </option>

                                @foreach ($work as $works)
                                <option value="{{$works->id}}">
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
                            <input type="text" name="namec" value="" id="namec" class="form-control" autocomplete="off"
                                required>
                        </div>
                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="idcardc"><b>เลขประจำตัว :</b>
                           
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="idcardc" minlength="13" maxlength="13"
                                onkeypress="preventNonNumericalInput(event)" id="idcardc" value="" class="form-control"
                                autocomplete="off" >
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
                                required></textarea>

                        </div>
                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="telc"><b>โทรศัพท์ :</b>
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="telc" value="" id="telc" value="" class="form-control"
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
                            <input type="emailc" name="emailc" value="" id="emailc" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="form-grup col-md-6 col-sm-12">
                        <label for="locationc"><b>สถานที่ URL :</b>
                            <span class="text-danger"></span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="locationc" value="" id="locationc" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="detailc"><b>รายละเอียด :</b>
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <textarea class="form-control" name="detailc" autocomplete="off" id="detailc" rows="4"
                                required></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="meetdate"><b>วันที่นัด :</b>
                            
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="date" name="meetdate" value="" id="meetdate" class="form-control"
                                autocomplete="off" >
                        </div>
                    </div>


                </div>
                {{-- endcard --}}
            </div>




            <div class="form-row">
                <div class="form-group col-sm-12 text-center">
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