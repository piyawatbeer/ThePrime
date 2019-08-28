@extends('layouts.app') @section('title', 'ผู้ใช้งาน') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-users"></i>
            <span>
                Template

            </span></li>
    </ol>
    <div class="card mb-3">
        @foreach ($option as $options)
        @endforeach
        <div class="card-header">
            <div class="text-left">


                @if($options->options_id) <i class="fas fa-edit"></i> แก้ไขข้อมูล {{$options->oname}} @else<i
                    class="fas fa-plus-circle"></i> เพิ่มข้อมูล@endif

            </div>
        </div>

        <form id="saveForm" method="post" action="/options/{{$options->options_id}}" autocomplete="off">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$options->options_id}}">

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">




                        <label for="part">บริการ
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <select name="template" id="template" class="form-control" required>



                                @foreach ($data as $datas)
                                <option value="{{$datas->id}}" @if($options->work_id==$datas->id) selected
                                    @endif>
                                    {{$datas->workname}}
                                </option>
                                @endforeach

                            </select>
                        </div>
                        <label style="padding-top:10px;" for="workname">ชื่องาน
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="oname" value="{{$options->oname }}" id="oname" value=""
                                class="form-control" autocomplete="off" required>
                        </div>
                        <label style="padding-top:10px;" for="workname">การรับประกัน (วัน)
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="number" name="garuntee" id="garuntee" value="{{$options->garuntee}}"
                                class="form-control" autocomplete="off" required>
                        </div>
                        <label style="padding-top:10px;" for="workname">รายละเอียด
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="detail" id="detail" value="{{$options->detail}}"
                                class="form-control" autocomplete="off" required>
                        </div>
                        <label style="padding-top:10px;" for="workname">เงื่อนไขการมัดจำ
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <textarea name="gname1" id="gname1" value="" rows="3" class="form-control"
                                autocomplete="off" required>{{$options->gname1}}</textarea>
                        </div>
                        <label style="padding-top:10px;" for="workname">เงื่อนไขการเสนอราคา
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <textarea name="gname2" id="gname2" value="" rows="3" class="form-control"
                                autocomplete="off" required>{{$options->gname2}}</textarea>
                        </div>
                        <label style="padding-top:10px;" for="workname">เงื่อนไขการประกัน
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <textarea name="gname3" id="gname3" value="" rows="3" class="form-control"
                                autocomplete="off" required>{{$options->gname3}}</textarea>
                        </div>
                        <label style="padding-top:10px;" for="workname">หมายเหตุ

                        </label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="comment" id="comment" value="{{$options->comment}}"
                                class="form-control" autocomplete="off">
                        </div>



                    </div>
                    <div class="col-sm-4">
                        <div class="card-header">

                            <div class="text-center">
                                ตั้งค่า
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="workname">Service
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="service" id="service" value="{{$options->service}}"
                                                class="form-control" autocomplete="off"
                                                onkeypress="isInputNumber(event)" placeholder="0.00" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="workname">ปริมาณ
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="fcost" id="fcost" value="{{$options->fcost}}"
                                                class="form-control" autocomplete="off"
                                                onkeypress="isInputNumber(event)" placeholder="0.00" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label style="padding-top:10px;" for="workname">Profit
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="profit" id="profit" value="{{$options->profit}}"
                                                class="form-control" autocomplete="off"
                                                onkeypress="isInputNumber(event)" placeholder="0.00" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label style="padding-top:10px;" for="workname">ราคาวัสดุลูกค้า
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="fcustomer" id="fcustomer"
                                                value="{{$options->fcustomer}}" class="form-control" autocomplete="off"
                                                onkeypress="isInputNumber(event)" placeholder="0.00" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label style="padding-top:10px;" for="workname">Vat
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="vat" id="vat" value="{{$options->vat}}"
                                                class="form-control" autocomplete="off"
                                                onkeypress="isInputNumber(event)" placeholder="0.00" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label style="padding-top:10px;" for="workname">ราคาแรงลูกค้า
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" name="fwage" id="fwage" value="{{$options->fwage}}"
                                                class="form-control" autocomplete="off"
                                                onkeypress="isInputNumber(event)" placeholder="0.00" required>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="form-row">
                <div class="form-group col-sm-12 text-center">
                    <a href="{{ url('options/') }}"> <button type="button" class="btn btn-danger"
                            data-dismiss="modal"><i class="fas fa-arrow-left"></i> ย้อนกลับ</button></a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                </div>
            </div>
        </form>

    </div>
</div>

</div>

{{-- ajax model --}}
@include('layouts.modal')

@endsection @section('script')

@endsection
<script>
    function isInputNumber(evt){
                
                var ch = String.fromCharCode(evt.which);
                
                if(!(/[0-9 .]/.test(ch))){
                    evt.preventDefault();
                }
                
            }
            
</script>