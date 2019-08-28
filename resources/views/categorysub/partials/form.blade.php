<form id="saveForm" method="post" autocomplete="off">
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="part">ส่วนที่
                    <span class="text-danger">*1</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select name="part" id="part" class="form-control ">
                        {{-- <option value="">Select Country</option>
                        <option value="0">0</option>
                        <option value="1">1</option> --}}
                        @if(empty($data->id))
                        <option value="">1 เลือกส่วนที่</option>
                        @endif @foreach($parts as $part)
                        <option value="{{ $part->id }}" @if($part->id==$data->part_id) selected
                            @endif>{{ $part->partname }}
                        </option>
                        @endforeach
                        {{-- @foreach($country_list as $country)
                        <option value="{{ $country->country}}">{{ $country->country }}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="group">กลุ่มที่
                    <span class="text-danger">*2</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select name="group" id="group" class="form-control ">
                        @if(!empty($data->id))
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}" @if($group->id==$data->group_id) selected
                            @endif>{{ $group->groupname }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="category">หมวดที่
                    <span class="text-danger">*3</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select name="category" id="category" class="form-control ">
                        @if(!empty($data->id))
                        @foreach($categorys as $category)
                        <option value="{{ $category->id }}" @if($category->id==$data->category_id) selected
                            @endif>{{ $category->categorynumber." ".$category->categoryname }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4 ">
                <label for="mod">เลขหมวดย่อย
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="typenumber" name="typenumber" value="{{ $data->typenumber }}"
                        class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-grup col-md-8 ">
                <label for="type">รายละเอียด
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="typename" name="typename" value="{{ $data->typename }}" class="form-control"
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
<script>
    $(document).ready(function() {
            $('#part').change(function () {
            var partID = $(this).val();
            if (partID) {
            //alert('sssss');
            $.ajax({
            url: '/categorysub/group/' + partID,
            type: "GET",
            data: { "_token": "{{ csrf_token() }}" },
            dataType: "json",
            success: function (data) {
            
            if (data) {
            $('#group').empty();
            $('#group').focus;
            $('#group').append('<option value="">2 เลือกกลุ่มที่</option>');
            $.each(data, function (key, value) {
            $('select[name="group"]').append('<option value="' + value.id + '">' + value.groupname + '</option>');
            });
            } else {
            $('#group').empty();$('#category').empty();
            }
            }
            });
            } else {
            $('#group').empty();$('#category').empty();
            // $('#group').append('<option value="">กลุ่มที่</option>');
            }
            
            });

            $('#group').change(function () {
            var groupID = $(this).val();
            if (groupID) {
            //alert('sssss');
            $.ajax({
            url: '/categorysub/category/' + groupID,
            type: "GET",
            data: { "_token": "{{ csrf_token() }}" },
            dataType: "json",
            success: function (data) {
            
            if (data) {
            $('#category').empty();
            $('#category').focus;
            $('#category').append('<option value="">3 เลือกหมวด</option>');
            $.each(data, function (key, value) {
            $('select[name="category"]').append('<option value="' + value.id + '">' + value.categorynumber+' '+value.categoryname + '</option>');   });
           
            //$('#typenumber').val('sssss');
            } else {
            $('#category').empty();
            }
            }
            });
            } else {
            $('#category').empty();
            // $('#group').append('<option value="">กลุ่มที่</option>');
            }
            
            });
            $('#category').change(function(){
                var category = $(this).val();
                if (category) {
                $.ajax({
                url: '/categorysub/categoryfind/' + category,
                type: "GET",
                data: { "_token": "{{ csrf_token() }}" },
                dataType: "json",
                success: function (data) {
                
                if (data) {
                    $.each(data, function (key, value) {
                        $('#typenumber').val(value.categorynumber);
                    });
                
            
                }
                else{

                    $('#typenumber').empty();
                }
            }
        });
    }
            
    });
    });
</script>