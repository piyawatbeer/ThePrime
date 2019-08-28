@extends('layouts.app') 
@section('content')
<div id="app">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"> <i class="fas fa-user-secret"></i>
    <span>ข้อมูลบริษัท</span></li>
    </ol>@foreach ($companys as $company)
    <div class="card mb-3" >
        <div class="card-header">
            <div class="text-right">
                <a href="#" data-href="{{ url('company/form/'.$company->id) }}" data-modal-name="ajaxModal" role="button"
                    class="btn btn-success btn-create">
                    <i class="fas fa-edit"></i> แก้ไขข้อมูล
                </a>
            </div>
            
        </div> 
        
        <div class="card-body sailorTableArea" >
           
            <table class="table table-bordered table-hover sailorTable"  width="100%">
                
                   
                  
                    <tr>
                       <td ><b>ชื่อบริษัท: </b> {{ $company->comname }}</td>    
                    </tr>
                    <tr>
                        <td ><b>ชื่อผู้ประกอบการ: </b> {{ $company->mname }}</td>
                    </tr>
                    <tr>
                        <td ><b>เลขประจำตัว: </b> {{ $company->idcard }}</td>
                    </tr>
                    <tr>
                        <td ><b>ที่อยู่: </b> {{ $company->address }}</td>
                    </tr>
                    <tr>
                        <td ><b>เบอร์โทร: </b> {{ $company->tel }}</td>
                    </tr>
                    <tr>
                        <td ><b>facebook: </b> {{ $company->facebook }}</td>
                    </tr>
                    <tr>
                        <td ><b>Line ID: </b>{{ $company->line }}</td>
                    </tr>
                    <tr>
                        <td ><b>E-mail: </b> {{ $company->email }}</td>
                    </tr>
                    @endforeach
                
                <tbody>

                </tbody>
            </table>
        </div>
    </div>    
</div>

{{-- ajax model --}}
@include('layouts.modal')

@endsection @section('script')
<script src="{{ asset('js/company.min.js') }}"></script>
@endsection
