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
            <label for="username">Username
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="username" value="{{ $data->username }}" class="form-control"
                    autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="password">รหัสผ่าน
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" id="password" name="password" value="" class="form-control"
                        autocomplete="off">
                </div>
            </div>
            <div class="form-grup col-md-6 col-sm-12">
                <label for="re_password">รหัสผ่านอีกครั้ง
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" name="re_password" value="" class="form-control" autocomplete="off">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="name">ชื่อ
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control" autocomplete="off">
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
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="department">แผนก</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="department" value="{{ $data->department }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>
            <div class="form-grup col-md-6 col-sm-12">
                <label for="user_type">ประเภท
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select name="user_type" class="form-control">
                        @if(empty($data->id))
                        <option value="">เลือกประเภท</option>
                        @endif
                        <option value="member" @if($data->user_type==='member') selected @endif>สมาชิกทั่วไป
                        </option>
                        <option value="admin" @if($data->user_type==='admin') selected @endif>ผู้ดูแลระบบ</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
    </div>
</form>