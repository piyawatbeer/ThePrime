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
            <span>ข้อมูล BOQ ราคา BOQ</span></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ url('boq/boqhistory/') }}" role="button"
                    class="btn btn-primary ">
                    <i class="fas fa-chart-line"></i> ดูราคาย้อนหลัง
                </a>
                <a href="#" data-href="{{ url('boq/change/0') }}"  data-modal-name="ajaxModal" role="button"
                    class="btn btn-primary btn-create">
                    <i class="fas fa-chart-line"></i> ปรับราคา
                </a>
                <a href="#" data-href="{{ url('boq/form/0') }}" data-modal-name="ajaxModal" role="button"
                    class="btn btn-success btn-create">
                    <i class="fas fa-plus-circle"></i> เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body sailorTableArea">
            <table class="table  display  text-center sailorTable" id="boq-table" width="100%"
                cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="400px">รายการ</th>
                        <th scope="col" width="100px">หน่วย</th>
                        <th scope="col" width="100px">ค่าวัสดุ</th> 
                        <th scope="col" width="100px">ค่าแรง</th> 
                        <th scope="col" width="100px">ต้นทุน</th>
                        <th scope="col" width="100px">จ้างช่าง</th>
                        <th scope="col" width="100px">หมายเหตุ</th>      
                        <th scope="col" width="150px">ดำเนินการ</th>
                        <th scope="col" width="10px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ajax model --}}

@include('layouts.modal')

@endsection @section('script')
<script src="{{ asset('js/boq.min.js') }}"></script>
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection