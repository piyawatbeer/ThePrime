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
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-users"></i>
            <span>ข้อมูล BOQ > <a title="ราคา BOQ" href="{{ url('/boq') }}">ราคา BOQ</a> > ดูราคาย้อนหลัง</span></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-center">

                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-6">

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <select name="history" id="history" class="form-control ">

                                <option value="">เลือกรายการ</option>
                                @foreach($history as $historys)
                                <option value="{{ $historys->id }}">
                                    {{ $historys->detail.' วันที่ '.date('d-m-Y', strtotime($historys->created_at)).' ค่าวัสดุ '.$historys->mcost.'% ค่าแรง '.$historys->mcost.'%' }}
                                </option>
                                @endforeach
                            </select>
                            <button type="text" id="btnFiterSubmitSearch" class="btn btn-primary">ค้นหา</button>
                        </div>
                    </div>



                </div>

            </div>
        </div>
        <div class="card-body" id="card-body">
            <div id="cbody">
            <table class="table  display  text-center" id="boq-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="300px">รายการ</th>
                        <th scope="col" width="80px">ค่าวัสดุ</th>
                        <th scope="col" width="80px">ก่อนปรับ</th>
                        <th scope="col" width="80px">ค่าแรง</th>
                        <th scope="col" width="80px">ก่อนปรับ</th>
                        <th scope="col" width="10px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

{{-- ajax model --}}

@include('layouts.modal')

@endsection @section('script')


<script src="{{ asset('js/boqhistory.min.js') }}"></script>
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection