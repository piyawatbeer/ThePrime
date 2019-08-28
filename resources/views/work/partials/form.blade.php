<form id="saveForm" method="post" autocomplete="off">
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label for="workname">บริการ
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="workname" value="{{ $data->workname }}" class="form-control"
                    autocomplete="off">
            </div>
        </div>



    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
    </div>
</form>