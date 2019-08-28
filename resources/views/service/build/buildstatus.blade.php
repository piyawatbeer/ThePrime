@foreach ($service as $services)

@endforeach
<form id="saveForm" action="/service/buildstatusu/{{$services->service_id}}" method="post" enctype="multipart/form-data"
    autocomplete="off">
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
                    <input type="radio" name="pledge_status" id="pledge_status" value="ประกัน" checked>
                    &nbsp;ประกัน
                    &nbsp;

                </div>
            </div>
        </div>
        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><b>วันที่จบงาน:</b><span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-8 text-left">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="date" name="enddate" value="" id="enddate" class="form-control" autocomplete="off"
                        required>
                </div>
            </div>
        </div>
        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><b>วันที่รับประกัน:</b><span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-8 text-left">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="date" name="garunteedate" value="" id="garunteedate" class="form-control"
                        autocomplete="off" required>
                </div>
            </div>
        </div>
        <div class="form-group row text-right">
            <div class="col-sm-4">
                <label for="workname"><b>แนลไฟล์:</b><span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-8 text-left">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="file" name="garunteepic" id="garunteepic" required class="form-control"
                        autocomplete="off">
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
    $(document).ready(function() {
           
        // e.preventDefault();
      
           (function($) {
            $.fn.checkFileType = function(options) {
            var defaults = {
            allowedExtensions: [],
            success: function() {},
            error: function() {}
            };
            options = $.extend(defaults, options);
            
            return this.each(function() {
            
            $(this).on('change', function() {
            var value = $(this).val(),
            file = value.toLowerCase(),
            extension = file.substring(file.lastIndexOf('.') + 1);
            
            if ($.inArray(extension, options.allowedExtensions) == -1) {
            options.error();
            $(this).focus();
            } else {
            options.success();
            }
            
            });
            
            });
            };
            
            })(jQuery);
            
            $(function() {
            $('#garunteepic').checkFileType({
            allowedExtensions: ['jpg', 'jpeg','png','pdf'],
            success: function() {
            if($('#garunteepic')[0].files[0].size<=2000000){showBox('ไฟล์ถูกต้อง', 'success' );}
                else{showBox('ไฟล์ขนาดใหญ่เกินไป', 'error' ); $('#garunteepic').val('');} //showBox('ไฟล์รูปถูกต้อง', 'success' );
                }, error: function() { showBox('ไฟล์ไม่ถูกต้อง', 'error' ); $('#garunteepic').val(''); } }); });
          
        });
      
  
    function myConfirm() {
        if($("#enddate").val()&&$("#garunteedate").val()&&$('#garunteepic').val()){
      var result = confirm("ยืนยันการตั้งค่า");
      if (result==true) {
        setInterval(function(){ 
     $( "#saveForm" ).submit();}, 700);
      } else {
       return false;
      }}else{showBox('กรอกข้อมูลไม่ครบ', 'error' );}
    }
</script>