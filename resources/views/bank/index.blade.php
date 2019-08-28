@extends('layouts.app') @section('title', 'ผู้ใช้งาน') @section('content')
<div id="app">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><i class="fas fa-fw fa-table"></i>
    <span>ข้อมูลธนาคาร</span></li>
</ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-right">
                <a href="#" data-href="{{ url('bank/form/0') }}" data-modal-name="ajaxModal" role="button"
                    class="btn btn-success btn-create">
                   <i class="fas fa-plus-circle"></i> เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body sailorTableArea">
            <table class="table table-hover table-striped text-center sailorTable" id="bank-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ธนาคาร</th>
                        <th scope="col">เลขบัญชี</th>
                        <th scope="col">ชื่อบัญชี</th>
                        <th scope="col">ดำเนินการ</th>
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
<script src="{{ asset('js/bank.min.js') }}"></script>
@endsection