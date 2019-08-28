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
            <label for="comname">ชื่อบริษัท
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="comname" value="{{ $data->comname }}" class="form-control"
                    autocomplete="off">
            </div>
        </div>

    

        <div class="form-group">
            <label for="mname">ชื่อผู้ประกอบการ
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="mname" value="{{ $data->mname }}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="idcard">เลขประจำตัว
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="idcard" value="{{ $data->idcard }}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="address">ที่อยู่
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="address" value="{{ $data->address }}" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="email">อีเมล์
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="email" value="{{ $data->email }}" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="facebook">facebook
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="facebook" id="facebook" value="{{ $data->facebook }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="tel">เบอร์โทร
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="text" id="tel" name="tel" value="{{ $data->tel }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>
            <div class="form-grup col-md-6 col-sm-12">
                <label for="line">ไลน์ไอดี
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="text" id="line" name="line" value="{{ $data->line }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>

        </div>
       

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
    </div>
</form>