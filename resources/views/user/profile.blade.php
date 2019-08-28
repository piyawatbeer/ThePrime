@extends('layouts.app')
@section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"> <i class="fas fa-id-card-alt"></i>
            <span>ข้อมูลส่วนตัว</span></li>
    </ol>
    {{-- @foreach ($users as $user) --}}
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-right">
                <a href="#" data-href="{{ url('formp/'.$users->id) }}" data-modal-name="ajaxModal" role="button"
                    class="btn btn-success btn-create">
                    <i class="fas fa-edit"></i> แก้ไขข้อมูล
                </a>
            </div>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover" id="company-table">
                <thead>


                    <tr>
                        <td><b>Username: </b> {{ $users->username }}</td>
                    </tr>
                    <tr>
                        <td><b>ชื่อ: </b> {{ $users->name }}</td>
                    </tr>
                    <tr>
                        <td><b>เบอร์โทร: </b> {{ $users->tel }}</td>
                    </tr>
                    <tr>
                        <td><b>facebook: </b> {{ $users->facebook }}</td>
                    </tr>
                    <tr>
                        <td><b>Line ID: </b>{{ $users->line }}</td>
                    </tr>
                    <tr>
                        <td><b>E-mail: </b> {{ $users->email }}</td>
                    </tr>
                    {{-- @endforeach --}}
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
<script src="{{ asset('js/user2.min.js') }}"></script>
@endsection