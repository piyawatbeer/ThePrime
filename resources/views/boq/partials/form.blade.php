<form id="saveForm" method="post" autocomplete="off">
    <input type="hidden" name="id" value="{{ $data->id }}">
    {{ csrf_field() }}
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
                        @if(empty($data->id))
                        <option value="">1 เลือกส่วนที่</option>
                        @endif @foreach($parts as $part)
                        <option value="{{ $part->id }}" @if($part->id==$data->part_id) selected
                            @endif>{{ $part->partname }}
                        </option>
                        @endforeach
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
            <div class="form-group col-md-6 col-sm-12">
                <label for="category">หมวดย่อย
                    <span class="text-danger">*4</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select name="type" id="type" class="form-control ">
                        @if(!empty($data->id))
                        @foreach($types as $type)
                        <option value="{{ $type->id }}" @if($type->id==$data->type_id) selected
                            @endif>{{ $type->typenumber." ".$type->typename }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="category">ประเภท
                    <span class="text-danger">*5</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select name="typesub" id="typesub" class="form-control ">
                        @if(!empty($data->id))
                        @foreach($typesubs as $typesub)
                        <option value="{{ $typesub->id }}" @if($typesub->id==$data->typesub_id) selected
                            @endif>{{ $typesub->typesubnumber." ".$typesub->typesubname }}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4 ">
                <label for="mod">รหัส BOQ
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="code" minlength="5" maxlength="5" name="code" value="{{ $data->code }}"
                        class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-grup col-md-8 ">
                <label for="type">รายการ
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="list" name="list" value="{{ $data->list }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-4 ">
                <label for="mod">หน่วย
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="unit" name="unit" value="{{ $data->unit }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>
            <div class="form-grup col-md-4 ">
                <label for="type">ค่าวัสดุ
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="number" id="mcost" name="mcost" value="{{ $data->mcost }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>
            <div class="form-grup col-md-4 ">
                <label for="type">ค่าแรง
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="number" id="wcost" name="wcost" value="{{ $data->wcost }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-row">
           <div class="form-group col-md-4 ">
               
            </div>
            <div class="form-grup col-md-4 ">
                <label for="type">ต้นทุน
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="number" id="mcostp" name="mcostp" value="{{ $data->mcostp }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>
            <div class="form-grup col-md-4 ">
                <label for="type">จ้างช่าง
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="number" id="wcostp" name="wcostp" value="{{ $data->wcostp }}" class="form-control"
                        autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="mod">หมายเหตุ
                    <span class="text-danger"></span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="comment" name="comment" value="{{ $data->comment }}" class="form-control">
                </div>
            </div>


        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="part">ราคา
                    <span class="text-danger">*</span>
                </label>


                @if(empty($data->type))

                <input type="radio" name="price" id="price" value="boq" checked> boq

                <input type="radio" name="price" id="price" value="prime"> prime
                @else
                @if(($data->type)=="boq")

                <input type="radio" name="price" id="price" value="boq" checked> boq

                <input type="radio" name="price" id="price" value="prime"> prime

                @elseif(($data->type)=="prime")

                <input type="radio" name="price" id="price" value="boq"> boq

                <input type="radio" name="price" id="price" value="prime" checked> prime

                @endif
                @endif



            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
        </div>
</form>
<script>
    $(document).ready(function() {

 $('input[type=radio]').change(function(){
      radioVal=$(this).val();
    str=$('#code').val();
    var res2 = str.substr(1,5);
    var res1 = str.substr(0,1);
      if(radioVal=="boq"){
         if($('#code').val()){
             ststr="A"+res2;
             $('#code').val(ststr);
         }
         else{}
          
        }
        else{
            if($('#code').val()){
            ststr="P"+res2;
            $('#code').val(ststr);
            }
            else{}
        }
      
      })

            $('#part').change(function () {
            var partID = $(this).val();
            if (partID) {
            //alert('sssss');
            $.ajax({
            url: '/boq/group/' + partID,
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
            url: '/boq/category/' + groupID,
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
            

    $('#category').change(function(){
        var category = $(this).val();
        if (category) {
            $.ajax({
            url: '/boq/typefind/' + category,
            type: "GET",
            data: { "_token": "{{ csrf_token() }}" },
            dataType: "json",
            success: function (data) {

            if (data) {
                $('#type').empty();
                $('#type').focus;
                $('#type').append('<option value="">4 เลือกหมวดย่อย</option>');
                $.each(data, function (key, value) {
                $('select[name="type"]').append('<option value="' + value.id + '">' + value.typenumber+' '+value.typename +
                '</option>'); });
                }
            }
            });
        }
        else{
        $('#type').empty();
        }
    });
    });

        $('#type').change(function(){
        var type = $(this).val();
        if (type) {
        $.ajax({
        url: '/boq/typesubfind/' + type,
        type: "GET",
        data: { "_token": "{{ csrf_token() }}" },
        dataType: "json",
        success: function (data) {
        
        if (data) {
        $('#typesub').empty();
        $('#typesub').focus;
        $('#typesub').append('<option value="">5 เลือกประเภท</option>');
        $.each(data, function (key, value) {
        $('select[name="typesub"]').append('<option value="' + value.id + '">' + value.typesubnumber+' '+value.typesubname +
            '</option>'); });
        }
        }
        });
        }
        else{
        
        $('#typesub').empty();
        }
        
        });
        
        
        });



   
            $('#type').change(function(){
                var type = $(this).val();
                if (type) {
                $.ajax({
                url: '/boq/typefinds/' + type,
                type: "GET",
                data: { "_token": "{{ csrf_token() }}" },
                dataType: "json",
                success: function (data) {
                
                if (data) {
                    $.each(data, function (key, value) {
                        var str = value.typenumber;
                        var res = str+"0";
                        $('#code').val(res);
                       
            });
            
                }
                else{

                    $('#code').empty();
                }
            }
        });
    }
            
    
    });
</script>