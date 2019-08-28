@extends('layouts.app') @section('title', 'ผู้ใช้งาน') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-users"></i>
            <span>
               Template 
             
            </span></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-right">
               
                <a href="{{ url('options/form/0') }}"  role="button"
                    class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body sailorTableArea">
       
            <table class="table table-hover  text-center sailorTable" id="options-table" width="100%"
                cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="40px">ลำดับ</th>
                        <th scope="col">รายการ</th>
                        <th scope="col">การรับประกัน</th>
                        <th scope="col">บริการ</th>
                        <th scope="col" width="100px">ดำเนินการ</th>
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
<script src="{{ asset('js/options.min.js') }}"></script>
@endsection