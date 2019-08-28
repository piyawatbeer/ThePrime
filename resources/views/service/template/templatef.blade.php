<form id="saveForm" action="/service/templateadd/{{$data}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{-- <input type="hidden" name="id" value="{{ $data->id }}"> --}}
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มใบเสนอราคา</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">


        <div class="form-group">
            <div class="text-center">
            <label for="workname"><b>เลือกรายการ :</b>
                <span class="text-danger">*</span>
            </label>
            </div><input type="radio" name="templateboq" id="templateboq" value="template" checked> &nbsp;Template&nbsp;
                 <div id="first"> <div class="input-group-prepend" style="padding:10px 0px;"> 
                     
                   <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select name="template" id="template" class="form-control" required>
                
                        <option value="">
                            เลือก Template 
                        </option>
                        @if($template)
                        @foreach ($template as $templates)
                        <option value="{{$templates->options_id}}">
                            {{$templates->oname}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
                 </div>
               
             {{-- <input type="radio" name="templateboq" id="templateboq" value="blank"> &nbsp;Blank --}}
        </div>

   
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
    </div> 
</div>
</form>
<script>
    $(document).ready(function() {
       
    // e.preventDefault();
    $('#first').show();
   $('input[type=radio]').change(function(){
radioVal=$(this).val();
    
    if(radioVal=="template"){
       $('#first').show();
    $('#template').prop('required',true);
}
    else{
    $('#template').prop('required',false);
    $('#template').val('');
    $('#first').hide();
    // $('#template').append('<option value="">teplate:</option>');
   
}
       
      
    });
   
});
   
</script>

{{-- <script type="text/javascript" src="https://www.jqueryscript.net/demo/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script> --}}