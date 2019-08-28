@extends('layouts.print') 
@section('content')
<style>
    body {
    background: rgb(204,204,204);
    }
    page {
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
    box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="A4"] {
    width: 21cm;
    height: 29.7cm;
    }
    page[size="A4"][layout="portrait"] {
    width: 29.7cm;
    height: 21cm;
    }
    page[size="A3"] {
    width: 29.7cm;
    height: 42cm;
    }
    page[size="A3"][layout="portrait"] {
    width: 42cm;
    height: 29.7cm;
    }
    page[size="A5"] {
    width: 14.8cm;
    height: 21cm;
    }
    page[size="A5"][layout="portrait"] {
    width: 21cm;
    height: 14.8cm;
    }
    @media print {
    body, page {
    margin: 0;
    box-shadow: 0;
    }
    }
</style>

<div id="app" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-users"></i>
            <span>ข้อมูล BOQ หมวดย่อย</span></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-right">

                <a href="#"  data-href="{{ url('categorysub/form/0') }}" data-modal-name="ajaxModal" role="button"
                    class="btn btn-success btn-create">
                    <i class="fas fa-plus-circle"></i> เพิ่มข้อมูล
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table  display  text-center" id="categorysub-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="10px"></th>
                        <th scope="col" width="10px"></th>
                        <th scope="col">หมวดย่อย</th>
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
<script src="{{ asset('js/categorysub.min.js') }}"></script>
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection
<script type="text/javascript">
  var delayInMilliseconds = 1000; //1 second

setTimeout(function() {
window.print();
window.close();
}, delayInMilliseconds);


</script>
