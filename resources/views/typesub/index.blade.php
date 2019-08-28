@extends('layouts.app') @section('title', 'ผู้ใช้งาน') @section('content')
<style>
    td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.shown td.details-control {
        background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
    }
</style>
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-users"></i>
            <span>ข้อมูล BOQ > ประเภท</span></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-right">

                <a href="#" data-href="{{ url('typesub/form/0') }}" data-modal-name="ajaxModal" role="button"
                    class="btn btn-success btn-create">
                    <i class="fas fa-plus-circle"></i> เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body sailorTableArea">
            <table class="table  display  text-center sailorTable" id="typesub-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col">ประเภท</th>
                        <th scope="col" width="80px">ดำเนินการ</th>
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
<script src="{{ asset('js/typesub.min.js') }}"></script>
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection