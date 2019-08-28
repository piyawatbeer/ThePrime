<form id="saveForm" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลสมาชิก {{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table">
            <tr>
                <td class="font-weight-bold text-right table-secondary" width="150px">Username:</td>
                <td>{{ $data->username }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right table-secondary" width="150px">รหัสผ่าน:</td>
                <td>*********</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right table-secondary" width="150px">ชื่อ:</td>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right table-secondary" width="150px">อีเมล์:</td>
                <td>{{ $data->email }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right table-secondary" width="150px">facebook:</td>
                <td>{{ $data->facebook }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right table-secondary" width="150px">ไลน์ไอดี:</td>
                <td>{{ $data->line }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right table-secondary" width="150px">เบอร์โทร:</td>
                <td>{{ $data->tel }}</td>
            </tr>
            <tr>
                <td class="font-weight-bold text-right table-secondary" width="150px">ประเภทผู้ใช้งาน:</td>
                <td>{{ $data->user_type }}</td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
    </div>
</form>