@foreach ($service as $services)

@endforeach
<form id="saveForm" action="/service/waitbuildstatusu/{{$services->service_id}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$services->service_id}}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cog"></i>ตั้งค่าสถานะ </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><i class="fas fa-folder"></i> <b>ข้อมูลงาน:</b></label>
            </div>
            <div class="col-sm-8 text-left">
                #<?php 
                    $num='';
                    for($i=3;$i>count((array)$services->service_code);$i--){
                        $num=$num.'0';
                    }
                    echo $num.$services->service_code;
                    ?> {{$services->workname}}
            </div>
        </div>
        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><b>ลูกค้า:</b></label>
            </div>
            <div class="col-sm-8 text-left">
                {{$services->namec}}
            </div>


        </div>
        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><b>ประเภทงาน:</b></label>
            </div>
            <div class="col-sm-8 text-left">
                {{$services->workname}}
            </div>

        </div>
        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><b>การดำเนินงาน:</b><span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-8 text-left">
                <div class="input-group-prepend">
                    <input type="radio" name="pledge_status" id="pledge_status" value="ก่อสร้าง" checked>
                    &nbsp;ก่อสร้าง
                    &nbsp;
                   
                </div>
            </div>
        </div>
        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><b>วันที่เริ่มก่อสร้าง:</b><span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-8 text-left">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="date" name="startdate" value="" id="startdate" class="form-control" autocomplete="off" required>
                </div>
            </div>
        </div>
        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><b>วันที่คาดว่าก่อสร้างเสร็จ:</b><span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-8 text-left">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="date" name="plandate" value="" id="plandate" class="form-control" autocomplete="off"
                        required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
            <button type="submit" class="btn btn-success" onclick="return myConfirm();"><i class="fas fa-save"></i>
                บันทึก</button>
        </div>
</form>

<script>
    function myConfirm() {
        if($("#startdate").val()&&$("#plandate").val()){
      var result = confirm("ยืนยันการตั้งค่า");
      if (result==true) {
        setInterval(function(){ 
     $( "#saveForm" ).submit();}, 700);
      } else {
       return false;
      }}else{showBox('กรอกข้อมูลไม่ครบ', 'error' );}
    }
</script>