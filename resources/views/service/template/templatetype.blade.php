@foreach ($template as $templates)
@endforeach
<form id="saveForm" method="post" action="/service/addtype/{{ $templates->template_id }}" autocomplete="off">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{ $templates->template_id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลประเภทงาน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">







        <div class="form-row">
            <div class="form-group  col-sm-12">
                <label for="mod">ชื่อประเภทงาน
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="otname" name="otname" value="" required class="form-control"
                        autocomplete="off">
                </div>
            </div>

        </div>



   
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success" id="btn-submit"><i class="fas fa-save"></i> บันทึก</button>
    </div> 
</div>
</form>