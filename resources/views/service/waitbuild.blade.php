@extends('layouts.app') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-folder"></i>
            <span>
                งานที่อยู่ระหว่างเสนอราคาก่อสร้าง

            </span></li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="text-center col-md-8 align-self-center">
                    <b>
                        <?php $year=(date('Y')+543);echo"ประจำปี ".$year;?>
                    </b>
                </div>
                <div class="text-right col-md-2">
                    {{-- <a href="" onclick="printpdf('/storage/pdf/survey.pdf');" title="พิมพ์ใบรังวัด"
                        data-modal-name="ajaxModal" role="button" class="btn btn-primary btnprn">
                      
                        <i class="fas fa-print"></i> ปริ้น
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="card-body sailorTableArea">

            <table class="table table-hover  text-center sailorTable" id="options-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="40px">ลำดับ</th>
                        <th scope="col">รายการ</th>
                        <th scope="col">ลูกค้า</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">ผู้รับงาน</th>
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
<script src="{{ asset('js/waitbuild.min.js') }}"></script>
{{-- <script>
    function printpdf(url){
var myWindows=window.open(url, '_blank');
myWindows.print();
}
</script> --}}
@endsection