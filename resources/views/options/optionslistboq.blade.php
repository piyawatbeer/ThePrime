@extends('layouts.app') @section('title', 'ผู้ใช้งาน') @section('content')
<style>
    /* td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
        }
        tr.shown td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
        } */
</style>
<div id="app">
    @foreach ($optiontype as $optionstype)
    @endforeach
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-users"></i>
           <a href="/options"> Template </a> > <a href="/options/data/{{$optionstype->options_id}}">ข้อมูล Template</a>
    </ol>
    <form id="saveForm" method="post" action="/options/addlistboq/{{$optionstype->options_id}}" enctype="multipart/form-data" autocomplete="off">
   {{ csrf_field() }}
   <input type="hidden" name="id" value="{{ $optionstype->options_id }}">
        <div class="card mb-3">
      
        <div class="card-header">
            <div class="text-left">
                <div class="row ">
                    <div class="col-sm-2 ">
                    <i class="fas fa-plus-circle"></i> เพิ่มรายการ  
                    </div>  
                    <div class="col-sm-2 text-right">
                        <label for="part"><b>ประเภทงาน:</b>
                            <span class="text-danger">*</span>
                        </label>
                    </div>
                    <div class="col-sm-8">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <select name="template" id="template" class="form-control col-6" required>
                    
                
                            <option value=""> เลือกประเภทงาน</option>
                         @foreach ($optiontype as $optionstype)
                            <option value="{{$optionstype->optionstype_id}}">
                                {{$optionstype->otname}}
                            </option>
                            @endforeach
                    
                        </select>
                    </div>
                    </div>
            </div>
            </div>
        </div>
        <div class="card-body sailorTableArea">
            <table class="table  display  text-center sailorTable" id="boq-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="300px">รายการ</th>
                        <th scope="col" width="80px">หน่วย</th>
                        <th scope="col" width="80px">ค่าวัสดุ</th>
                        <th scope="col" width="80px">ค่าแรง</th>
                        <th scope="col" width="80px">ต้นทุน</th>
                        <th scope="col" width="80px">จ้างช่าง</th>
                        <th scope="col" width="100px">หมายเหตุ</th>
                       
                        <th scope="col" width="10px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-12 text-center">
            <a href="{{ url('options/data/'.$optionstype->options_id.'') }}"> <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-arrow-left"></i> ย้อนกลับ</button></a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
        </div>
    </div>

</div>
</form>
{{-- ajax model --}}

@include('layouts.modal')

@endsection @section('script')
<script src="{{ asset('js/optionslistboq.min.js') }}"></script>
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection