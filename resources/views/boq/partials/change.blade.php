<form id="saveForm2" method="post" action="/boq/addchange" autocomplete="off">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ปรับราคา %</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-row">
            <div class="form-grup col-md-6 col-sm-12">
                <label for="type">ค่าวัสดุ
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="number" id="mcost" name="mcost" value="" class="form-control" autocomplete="off"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="4">
                </div>
            </div>
            <div class="form-grup col-md-6 col-sm-12">
                <label for="type">ค่าแรง
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="number" id="wcost" name="wcost" value="" class="form-control" autocomplete="off"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="4">
                </div>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group  col-sm-12">
                <label for="mod">หมายเหตุ
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="detail" name="detail" value="" class="form-control" autocomplete="off">
                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label for="part">ราคา
                    <span class="text-danger">*</span>

                </label>



                <input type="radio" name="price" id="price" value="add" checked> เพิ่มราคา

                <input type="radio" name="price" id="price" value="loss"> ลดราคา


            </div>
        </div>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
        <button type="submit" class="btn btn-success" id="btn-submit"><i class="fas fa-save"></i> บันทึก</button>
    </div>
</form>
{{-- <script>
var app = new Vue({
el: '#app',
data: {
data: {}
}
});
$(document).ready(function () {
$('#ajaxModal').on('shown.bs.modal', function (e) {
$('#saveForm2').validate({
submitHandler: function (form) {
var id2 = $('input[name=id]').val();
var url2 = APP_URL + '/boqchange' ;

saveForm2(id2, url2, table);
},
rules: {

mcost: {
required: true
},
wcost: {
required: true
},
price: {
required: true
},
detail: {
required: true
}
},
messages: {},
errorElement: 'span',
errorPlacement: function (error, element) {
error.addClass("error-block");
error.addClass("invalid-feedback");
if (element.prop("type") === "checkbox") {
error.insertAfter(element.parent("label"));
} else if (element.parent('.input-group').length) {
error.insertAfter(element.parent()); /* radio checkbox? */
} else if (element.hasClass('select2')) {
error.insertAfter(element.next('span')); /* select2 */
} else {
error.insertAfter(element);
}
},
highlight: function (element, errorClass, validClass) {
$(element).parents('.form-group').addClass('has-error').removeClass('has-success');
$(element).addClass('is-invalid').removeClass('is-valid');
},
unhighlight: function (element, errorClass, validClass) {
$(element).parents('.form-group').addClass('has-success').removeClass('has-error');
$(element).addClass('is-valid').removeClass('is-invalid');
}
});
});
});
</script> --}}