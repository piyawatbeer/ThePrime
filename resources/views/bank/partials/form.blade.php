<form id="saveForm" method="post" autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label for="username">ธนาคาร
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="bname" value="{{ $data->bname }}" class="form-control"
                    autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="name">หมายเลขบัญชี
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="number" value="{{ $data->number }}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="name">ชื่อบัญชี
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control" autocomplete="off">
            </div>
        </div>
       
        <div class="form-group">
            <label for="name">รูป
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="file" name="file" id="file" class="form-control-file">
            </div>
            <br>
            <img src="{{ Storage::url($data->pic) }}" width='70' class="img-thumbnail  @if(empty($data->pic)) invisible @else visible @endif">
              
                <input type="hidden" name="file_name" value="{{ $data->pic }}" id="file_name">
                <input type="hidden" name="bfile_name" value="{{ $data->pic }}" id="bfile_name">
               
        </div>
       

    </div>
    <div class="modal-footer">
        <button type="button" id="cancle" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
    </div>
</form>