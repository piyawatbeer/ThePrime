<form id="saveForm" action="/service/designment/{{$data}}" method="post" enctype="multipart/form-data" autocomplete="off">
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
        <div class="form-group">
            <label for="meetdate"><b>ความคิดเห็น :</b>
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <textarea class="form-control" name="detail" autocomplete="off" id="detail" rows="4"
                    required></textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
    </div>
</form>


{{-- <script type="text/javascript" src="https://www.jqueryscript.net/demo/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script> --}}