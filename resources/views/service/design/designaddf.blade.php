<form id="saveForm" action="/service/designadd/{{$data}}" method="post" enctype="multipart/form-data" autocomplete="off">
    {{ csrf_field() }}
    {{-- <input type="hidden" name="id" value="{{ $data->id }}"> --}}
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> เพิ่มการออกแบบ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group text-center">
        <label for="meetdate"><b>การออกแบบครั้งที่ @foreach ($count as $counts)
           {{ $counts->Num+1}}
        @endforeach
    </b>
                
            </label>
        </div>
        {{-- <div class="row">
            <div class="col"> --}}
        <div class="form-group">
            <label for="meetdate"><b>แนบรูป :</b>
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="file" name="designpic" id="designpic" required class="form-control" autocomplete="off">
            </div>
        {{-- </div>
            </div> --}}
        </div>
        {{-- <div class="row">
            <div class="col"> --}}
            <div class="form-group">
                <label for="meetdate"><b>แนบรูป Dropbox :</b>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="design_dropbox" id="design_dropbox"  class="form-control" autocomplete="off">
                </div>
            {{-- </div>
            </div> --}}
        </div>
    
    
    <div class="modal-footer">
    
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
    </div>
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
        $('#designpic').checkFileType({
        allowedExtensions: ['jpg', 'jpeg','png'],
        success: function() {
        if($('#designpic')[0].files[0].size<=2000000){showBox('ไฟล์รูปถูกต้อง', 'success' );}
            else{showBox('ไฟล์รูปขนาดใหญ่เกินไป', 'error' ); $('#designpic').val('');} //showBox('ไฟล์รูปถูกต้อง', 'success' );
            }, error: function() { showBox('ไฟล์รูปไม่ถูกต้อง', 'error' ); $('#designpic').val(''); } }); });
      
    });
  
</script>

{{-- <script type="text/javascript" src="https://www.jqueryscript.net/demo/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script> --}}