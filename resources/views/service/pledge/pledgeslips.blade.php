<form id="saveForm" action="/service/slipsadd/{{$data}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{-- <input type="hidden" name="id" value="{{ $data->id }}"> --}}
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มใบเสนอราคามัดจำ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">


        <div class="form-group">
            <label for="workname">ประเภทมัดจำ :
                <span class="text-danger">*</span>
            </label>
            <div class="input-group-prepend">
                <input type="radio" name="pledge_type" id="pledge_type" value="price" checked> &nbsp;จำนวนเงิน
                &nbsp;
                <input type="radio" name="pledge_type" id="pledge_type" value="persent"> &nbsp;เปอร์เซ็นต์
            </div>
        </div>
        <div id="first">
            <div class="form-group">
                <label for="workname">จำนวนเงิน :
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" style="width:150px;" name="totals" id="totals" value="" class="form-control"
                        autocomplete="off"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="15">
                </div>
            </div>

        </div>
        <div id="persent">
            <div class="form-group">
                <label for="workname">ราคา :
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" style="width:150px;" name="price" id="price" value="" class=" form-control"
                        autocomplete="off"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="20">
                </div>
            </div>
            <div class="form-group">
                <label for="workname">เปอร์เซ็นต์ :
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" style="width:150px;" name="persent" id="persent" value="" class="form-control"
                        autocomplete="off"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="4">
                </div>
            </div>
            <div class="form-group">
                <label for="workname">จำนวนเงิน :
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" style="width:150px;" name="total" id="total" readonly value=""
                        class=" form-control" autocomplete="off"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="20">
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
       
    // e.preventDefault();
    $('#persent').hide();
    $('[name="totals"]').prop('required',true);
    $('[name="totals"]').click(function() {

        $('[name="totals"]').val('');
        $('[name="totals"]').prop('required',true);
    });
   
     $('[name="totals"]').change(function(){
         
            
           $('#totals').val(numberWithCommas($('[name="totals"]').val()));
         
            
        });
       $('input[type=radio]').change(function(){
         
    radioVal=$(this).val();
    if(radioVal=="price"){$('#persent').hide();$('#first').show();
    $('[name="totals"]').prop('required',true);
        $('[name="totals"]').val('');
        $('[name="total"]').prop('required',false);
        $('[name="price"]').prop('required',false);
        $('[name="persent"]').prop('required',false);
}
    else{$('#persent').show();$('#first').hide();
    $('[name="totals"]').prop('required',false);
    $('[name="total"]').prop('required',true);
    $('[name="price"]').prop('required',true);
    $('[name="persent"]').prop('required',true);
        var input = $('[name="price"],[name="persent"]'),
        input1 = $('[name="price"]'),
        input2 = $('[name="persent"]'),
        input3 = $('[name="total"]');
        input1.val('');
        input2.val('');
        input3.val('');
        data=0;
        var data,val1,val2 =0;
       
        input.change(function () {
       $('[name="price"]').click(function(){
        $('[name="price"]').val('');
        $('[name="persent"]')
            val1 = parseInt(input1.val(''));
            val2 = parseInt(input2.val(''));
            input3.val('');
            data=0;
        });
        $('[name="persent"]').click(function(){
        
        $('[name="persent"]').val('');
        data=0;
        // val1 = parseInt(input1.val());
        val2 = parseInt(input2.val(''));
        val1 = parseInt(input1.val());
        });
        val1 = parseInt(input1.val());
        val2 = parseInt(input2.val());
        // var num1 =  val1;
      
        // var data1=parseFloat(num1.replace(/,/g, ''));
        
        
        
       //input1.val(val1);
        
       if((input1.val())&&(input2.val())){  data=(input2.val()*input1.val())/100;
       
        input3.val(numberWithCommas(data)); 
        input1.val(numberWithCommas(input1.val()));
       
        
        }
        
      
       
    //    input3.val(numberWithCommas(data));
    //    input1.val(numberWithCommas(val1))
    //    $('.money').simpleMoneyFormat();
        });
//    input1.val(format2(val1,''));
}
       });
       
      
    });
    function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>

{{-- <script type="text/javascript" src="https://www.jqueryscript.net/demo/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script> --}}