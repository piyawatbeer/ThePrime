@extends('layouts.app') @section('title', 'ผู้ใช้งาน') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-folder"></i>
            <span>
                ใบเสนอราคา

            </span></li>
    </ol>
    <div class="card mb-3">
        @foreach ($option as $options)
        @endforeach
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text-left">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-right">


                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">


                            {{-- <a href="{{ url('categorysub/print') }}" target="blank" data-modal-name="ajaxModal"
                            role="button"
                            class="btn btn-primary btnprn"> --}}
                            <i class="fas fa-print"></i> ปริ้น

                        </button>
                        <div class="dropdown-menu">
                            {{-- <a class="dropdown-item" href="" title="พิมพ์ใบรังวัด" onclick="printpdf('/storage/pdf/survey.pdf');"><i
                                                            class="fas fa-print"></i>
                                                        พิมพ์ใบรังวัด</a>
                                                    <a class="dropdown-item" href="/service/pledgeprint/{{$options->service_id}}"
                            target="blank"><i class="fas fa-print"></i> พิมพ์ใบเสนอราคามัดจำ</a> --}}
                            <a class="dropdown-item" href="/service/templateprint/{{$options->service_id}}"
                                target="blank"><i class="fas fa-print"></i> พิมพ์ใบเสนอราคาลูกค้า</a>
                            <a class="dropdown-item" href="/service/templateprints/{{$options->service_id}}"
                                target="blank"><i class="fas fa-print"></i> พิมพ์ใบเสนอราคา Prime</a>
                            <a class="dropdown-item" href="/service/templatedifprint/{{$options->service_id}}"
                                target="blank"><i class="fas fa-print"></i> พิมพ์ใบตรวจสอบราคา</a>
                            {{-- <a class="dropdown-item" href="#" target="blank">Link 3</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-8">

                    <ul class="list-group">
                        <li class="list-group-item" style="background-color:lightgray;">
                            <div class="text-center">
                                <b>ข้อมูล</b>
                            </div>

                        </li>




                        <li class="list-group-item">

                            <b>บริการ :</b>


                            {{$options->workname}}


                        </li>
                        <li class="list-group-item">

                            <b>ชื่องาน :</b>


                            {{$options->tname}}


                        </li>
                        <li class="list-group-item">

                            <b>การรับประกัน :</b>


                            {{$options->tgaruntee}}


                        </li>
                        <li class="list-group-item">

                            <b>เงื่อนไข :</b>


                            {{$options->tgname}}

                        </li>
                        <li class="list-group-item">

                            <b>รายละเอียด :</b>


                            {{$options->tdetail}}

                        </li>
                    </ul>

                </div>
                <div class="col-sm-4">
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item" style="background-color:lightgray;">
                                <div class="text-center">
                                    <b>ตั้งค่า</b>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row text-center">
                                    <div class="col-sm-6">
                                        <b>Service :</b>


                                        {{$options->tservice}}
                                    </div>
                                    <div class="col-sm-6">
                                        <b>ต้นทุน :</b>


                                        {{$options->tfcost}}
                                    </div>
                                </div>
                            </li>


                            <li class="list-group-item">
                                <div class="row text-center">
                                    <div class="col-sm-6">
                                        <b>Profit :</b>


                                        {{$options->tprofit}}
                                    </div>
                                    <div class="col-sm-6">
                                        <b>ลูกค้า :</b>


                                        {{$options->tfcustomer}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row text-center">
                                    <div class="col-sm-6">
                                        <b>Vat :</b>

                                        </label>
                                        {{$options->tvat}}
                                    </div>
                                    <div class="col-sm-6">
                                        <b>จ้างช่าง :</b>

                                        </label>
                                        {{$options->tfwage}}
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <form id="saveForm" method="post" action="/service/templateupdate/{{$options->template_id}}" autocomplete="off">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-sm-12 text-center">
                <div class="sailorTableArea">
                    {{-- @foreach ($check as $checks){{$checks->total}}

                    @endforeach --}}
                    <table class="table  text-center sailorTable" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" width="40px">ลำดับ</th>
                                <th scope="col">รายการ</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">ต้นทุน</th>
                                <th scope="col">จำนวนรวม</th>
                                <th scope="col">หน่วย</th>
                                <th scope="col">ค่าวัสดุ</th>
                                <th scope="col">ค่าวัสดุรวม</th>
                                <th scope="col">ค่าแรง</th>
                                <th scope="col">ค่าแรงรวม</th>
                                <th scope="col" width="100px">หมายเหตุ</th>
                                <th scope="col" class="bg-cream">ลูกค้า</th>
                                <th scope="col" class="bg-cream">ค่าวัสดุ</th>
                                <th scope="col" class="bg-cream">ค่าวัสดุรวม</th>
                                <th scope="col" class="bg-cream">จ้างช่าง</th>
                                <th scope="col" class="bg-cream">ค่าแรง</th>
                                <th scope="col" class="bg-cream">ค่าแรงรวม</th>
                                <th scope="col" class="bg-cream">รวมเป็นเงิน</th>
                                <th scope="col" class="bg-sky">ต้นทุน</th>
                                <th scope="col" class="bg-sky">ต้นทุนรวม</th>
                                <th scope="col" class="bg-sky">จ้างช่าง</th>
                                <th scope="col" class="bg-sky">จ้างช่างรวม</th>
                                <th scope="col" class="bg-sky">รวมเป็นเงิน</th>
                                <th scope="col" class="bg-sky" width="100px">ส่วนต่างกำไร</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $j=0;?>
                            @foreach ($templatetype as $key=>$templatetypes)
                            <tr>
                                <td class="text-left" style="background:lightgray;" colspan="2">
                                    {{$templatetypes->totname}}
                                </td>
                                <td class="text-right" style="background:lightgray;"><b>ช่างที่รับงาน :</b></td>

                                <td class="text-left" colspan="2" style="background:lightgray;">
                                    <div class="input-group-prepend">
                                        <input type="hidden" name="templatetype_id[]" id="templatetype_id[]"
                                            value="{{$templatetypes->templatetype_id}}">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span><input
                                            type="text" name="tworker[]" id="tworker[]"
                                            class="tworker form-control text-center" placeholder="ชื่อช่าง"
                                            value="{{$templatetypes->tworker}}" readonly>
                                    </div>

                                </td>
                                <td class="text-left" style="background:lightgray;">@if($templatetypes->tworker)<a
                                        href="/service/tworkerprint/{{$templatetypes->templatetype_id}}"
                                        class="btn btn-outline-primary btn-md" title="พิมพ์" target="_blank"><i
                                            class="fas fa-print" width="100%" height="100%"></i></a>@endif</td>
                                <td class="text-left" colspan="18" style="background:lightgray;"></td>
                            </tr>
                            <?php $i=0; $j++?>
                            @foreach ($templatelist as $templatelists)
                            @if(($templatelists->templatetype_id)==($templatetypes->templatetype_id))

                            <tr>
                                <td>{{++$i}}</td>
                                <td class="text-left">{{$templatelists->tlist}} </td>
                                <input type="hidden" name="templatelist_id[]" id="templatelist_id[]"
                                    value="{{$templatelists->templatelist_id}}" readonly>
                                <td class="text-center"><input type="text" onkeypress="isInputNumber(event)"
                                        style="width:90px;" class="tvalue form-control text-center" name="tvalue[]"
                                        id="tvalue[]" value="{{$templatelists->tvalue}}" readonly></td>
                                <td><input type="text" name="tfcostl[]" id="tfcostl[]"
                                        class="tfcostl form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tfcostl}}" onkeypress="isInputNumber(event)" readonly>
                                </td>
                                <td><input type="text" name="tvaluetotal[]" id="tvaluetotal[]"
                                        class="tvaluetotal form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tvaluetotal}}" readonly></td>
                                <td>{{$templatelists->tunit}}</td>
                                <td><input type="text" name="tmcost[]" id="tmcost[]"
                                        class="tmcost form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tmcost}}" readonly></td>
                                <td><input type="text" name="tmcosttotal[]" id="tmcosttotal[]"
                                        class="tmcosttotal form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tmcosttotal}}" readonly></td>
                                <td><input type="text" name="twcost[]" id="twcost[]"
                                        class="twcost form-control text-center" style="width:90px;"
                                        value="{{$templatelists->twcost}}" readonly></td>
                                <td><input type="text" name="twcosttotal[]" id="twcosttotal[]"
                                        class="twcosttotal form-control text-center" style="width:90px;"
                                        value="{{$templatelists->twcosttotal}}" readonly></td>
                                <td><input type="text" name="tcomment[]" id="tcomment[]"
                                        class="tcomment form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tcomment}}" readonly></td>
                                <td class="bg-cream"><input type="text" name="tfcustomerl[]" id="tfcustomerl[]"
                                        class="tfcustomerl form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tfcustomerl}}" onkeypress="isInputNumber(event)"
                                        readonly></td>
                                <td class="bg-cream"><input type="text" name="tmcostc[]" id="tmcostc[]"
                                        class="tmcostc form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tmcostc}}" readonly></td>
                                <td class="bg-cream"><input type="text" name="tmcostctotal[]" id="tmcostctotal[]"
                                        class="tmcostctotal form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tmcostctotal}}" readonly></td>
                                <td class="bg-cream"><input type="text" name="tfwagel[]" id="tfwagel[]"
                                        class="tfwagel form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tfwagel}}" onkeypress="isInputNumber(event)" readonly>
                                </td>
                                <td class="bg-cream"><input type="text" name="twcostc[]" id="twcostc[]"
                                        class="twcostc form-control text-center" style="width:90px;"
                                        value="{{$templatelists->twcostc}}" readonly></td>
                                <td class="bg-cream"><input type="text" name="twcostctotal[]" id="twcostctotal[]"
                                        class="twcostctotal form-control text-center" style="width:90px;"
                                        value="{{$templatelists->twcostctotal}}" readonly></td>
                                <td class="bg-cream"><input type="text" name="tsumlist[]" id="tsumlist[]"
                                        class="tsumlist form-control text-center" style="width:120px;"
                                        value="{{$templatelists->tsumlist}}" readonly></td>
                                <td class="bg-sky"><input type="text" name="tmcostp[]" id="tmcostp[]"
                                        class="tmcostp form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tmcostp}}" readonly></td>
                                <td class="bg-sky"><input type="text" name="tmcostptotal[]" id="tmcostptotal[]"
                                        class="tmcostptotal form-control text-center" style="width:90px;"
                                        value="{{$templatelists->tmcostptotal}}" readonly></td>
                                <td class="bg-sky"><input type="text" name="twcostp[]" id="twcostp[]"
                                        class="twcostp form-control text-center" style="width:90px;"
                                        value="{{$templatelists->twcostp}}" readonly></td>
                                <td class="bg-sky"><input type="text" name="twcostptotal[]" id="twcostptotal[]"
                                        class="twcostptotal form-control text-center" style="width:90px;"
                                        value="{{$templatelists->twcostptotal}}" readonly></td>
                                <td class="bg-sky"><input type="text" name="tsumlistc[]" id="tsumlistc[]"
                                        class="tsumlistc form-control text-center" style="width:120px;"
                                        value="{{$templatelists->tsumlistc}}" readonly></td>
                                <td class="bg-sky"><input type="text" name="tsumprofit[]" id="tsumprofit[]"
                                        class="tsumprofit form-control text-center" style="width:120px;"
                                        value="{{$templatelists->tsumprofit}}" readonly></td>

                            </tr>

                            @else
                            {{-- <tr>
                            <td colspan="6" height="40px"></td>
                        </tr> --}}
                            @endif

                            @endforeach
                            @endforeach
                        </tbody>
                        <tr>




                            <td scope="col" class="text-right" colspan="17"><b>ยอดสุทธิ</b></td>
                            <td scope="col"><input type="text" name="tsumlists" id="tsumlists"
                                    class="tsumlists form-control text-center" style="width:120px;"
                                    value="{{$options->tsumlists}}" readonly></td>
                            <td scope="col" colspan="5" class="text-right"><b>รวมทั้งหมด</b></td>
                            <td scope="col"><input type="text" name="tsumprofits" id="tsumprofits"
                                    class="tsumprofits form-control text-center" style="width:120px;"
                                    value="{{$options->tsumprofits}}" readonly></td>

                        </tr>
                        <tr>




                            <td scope="col" class="text-right" colspan="17"><b>สินค้าแลบริการ</b></td>
                            <td scope="col"><input type="text" name="tproductprice" id="tproductprice"
                                    class="tproductprice form-control text-center" style="width:120px;"
                                    value="{{$options->tproductprice}}" readonly></td>
                            <td scope="col" colspan="5" class="text-right"><b>ภาษี 7%</b></td>
                            <td scope="col"><input type="text" name="tvatl2" id="tvatl2"
                                    class="tvatl2 form-control text-center" style="width:120px;"
                                    value="{{$options->tvatl}}" readonly></td>

                        </tr>
                        <tr>




                            <td scope="col" class="text-right" colspan="17"><b>ภาษี 7%</b></td>
                            <td scope="col"><input type="text" name="tvatl" id="tvatl"
                                    class="tvatl form-control text-center" style="width:120px;"
                                    value="{{$options->tvatl}}" readonly></td>
                            <td scope="col" colspan="5" class="text-right"><b>กำไรคาดการณ์</b></td>
                            <td scope="col"><input type="text" name="tgprofitpant" id="tgprofitpant"
                                    class="tgprofitpant form-control text-center" style="width:120px;"
                                    value="{{$options->tgprofitpant}}" readonly></td>

                        </tr>
                        <tr>




                            <td scope="col" class="text-right" colspan="17"><b>รวมทั้งหมด</b></td>
                            <td scope="col"><input type="text" name="tsumlists2" id="tsumlists2"
                                    class="tsumlists2 form-control text-center" style="width:120px;"
                                    value="{{$options->tsumlists}}" readonly></td>
                            <td scope="col" colspan="5" class="text-right"><b>ต้นทุน</b></td>
                            <td scope="col"><input type="text" name="tcostlast" id="tcostlast"
                                    class="tcostlast form-control text-center" style="width:120px;"
                                    value="{{$options->tcostlast}}" readonly></td>

                        </tr>
                        <tr>





                            <td scope="col" colspan="23" class="text-right"><b>สัดส่วนกำไร %</b></td>
                            <td scope="col"><input type="text" name="tpersent" id="tpersent"
                                    class="tpersent form-control text-center" style="width:120px;"
                                    value="{{$options->tpersent}}" readonly></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12 text-center">
                <a href="{{ url('service/endprojectD/'.$options->service_id) }}" {{-- href="{{ url()->previous() }}" --}}>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-left"></i>
                        ย้อนกลับ</button></a>
                {{-- <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button> --}}
            </div>
        </div>
    </form>
</div>

{{-- ajax model --}}
@include('layouts.modal')

@endsection @section('script')
<script>
    function isInputNumber(evt){
        
        var ch = String.fromCharCode(evt.which);
        
        if(!(/[0-9.]/.test(ch))){
        evt.preventDefault();
        }
        
        }
$(document).ready(function () {
  
    $(".tvalue").change(function() {
    $("tr").each(function() {
    if ($(this).find(".tvalue")) {
    var tvalue = Number($(this).find(".tvalue").val());
    var tfcostl = Number($(this).find(".tfcostl").val());
    var sumvalue = tfcostl *tvalue;
    if(sumvalue){sumvalue=sumvalue.toFixed(0);}
    else{sumvalue="";}
    $(this).find(".tvaluetotal").val(sumvalue);
    var tmcost = Number($(this).find(".tmcost").val());
    var tmcosttotal=tmcost*sumvalue;
    $(this).find(".tmcosttotal").val(tmcosttotal.toFixed(2));
    var twcost = Number($(this).find(".twcost").val());
    var twcosttotal=twcost*sumvalue;
    var tsumlist =tmcosttotal+twcosttotal;
    $(this).find(".twcosttotal").val(twcosttotal.toFixed(2));
    // ราคากลางรวมแต่ต้องมีฟิวมารับค่า
    // var tsumlist =tmcosttotal+twcosttotal;
    // tsumlistSum();
    // $(this).find(".tsumlist").val(tsumlist);
    var tfcustomerl = Number($(this).find(".tfcustomerl").val());
    var tmcostc=tmcost*tfcustomerl;
    $(this).find(".tmcostc").val(tmcostc.toFixed(2));
    var tmcostctotal=tmcostc*sumvalue;
    $(this).find(".tmcostctotal").val(tmcostctotal.toFixed(2));
    var tfwagel = Number($(this).find(".tfwagel").val());
    var twcostc=twcost*tfwagel;
    $(this).find(".twcostc").val(twcostc.toFixed(2));
    var twcostctotal=twcostc*sumvalue;
    $(this).find(".twcostctotal").val(twcostctotal.toFixed(2));
    var tsumlist =tmcostctotal+twcostctotal;
    tsumlistSum();
    $(this).find(".tsumlist").val(tsumlist.toFixed(2));
    var tmcostp = Number($(this).find(".tmcostp").val());
    var tmcostptotal = tmcostp*tvalue;
   $(this).find(".tmcostptotal").val(tmcostptotal.toFixed(2));
   var twcostp = Number($(this).find(".twcostp").val());
    var twcostptotal = twcostp*tvalue;
    $(this).find(".twcostptotal").val(twcostptotal.toFixed(2));
    var tsumlistc =tmcostptotal+twcostptotal;
    $(this).find(".tsumlistc").val(tsumlistc.toFixed(2));
    var tsumprofit = tsumlist - tsumlistc;
    tsumprofitSum();
    $(this).find(".tsumprofit").val(tsumprofit.toFixed(2));
    }
    })

});
//$("#tsumlists").val(tsumlist);
$(".tfcostl").change(function() {
$("tr").each(function() {
if ($(this).find(".tvalue")) {
var tvalue = Number($(this).find(".tvalue").val());
var tfcostl = Number($(this).find(".tfcostl").val());
var sumvalue = tfcostl *tvalue;
if(sumvalue){sumvalue=sumvalue.toFixed(0);}
else{sumvalue="";}
$(this).find(".tvaluetotal").val(sumvalue);
var tmcost = Number($(this).find(".tmcost").val());
var tmcosttotal=tmcost*sumvalue;
$(this).find(".tmcosttotal").val(tmcosttotal.toFixed(2));
var twcost = Number($(this).find(".twcost").val());
var twcosttotal=twcost*sumvalue;
var tsumlist =tmcosttotal+twcosttotal;
$(this).find(".twcosttotal").val(twcosttotal.toFixed(2));
// ราคากลางรวมแต่ต้องมีฟิวมารับค่า
// var tsumlist =tmcosttotal+twcosttotal;
// tsumlistSum();
// $(this).find(".tsumlist").val(tsumlist);
var tfcustomerl = Number($(this).find(".tfcustomerl").val());
var tmcostc=tmcost*tfcustomerl;
$(this).find(".tmcostc").val(tmcostc.toFixed(2));
var tmcostctotal=tmcostc*sumvalue;
$(this).find(".tmcostctotal").val(tmcostctotal.toFixed(2));
var tfwagel = Number($(this).find(".tfwagel").val());
var twcostc=twcost*tfwagel;
$(this).find(".twcostc").val(twcostc.toFixed(2));
var twcostctotal=twcostc*sumvalue;
$(this).find(".twcostctotal").val(twcostctotal.toFixed(2));
var tsumlist =tmcostctotal+twcostctotal;
tsumlistSum();
$(this).find(".tsumlist").val(tsumlist.toFixed(2));
var tmcostp = Number($(this).find(".tmcostp").val());
var tmcostptotal = tmcostp*tvalue;
$(this).find(".tmcostptotal").val(tmcostptotal.toFixed(2));
var twcostp = Number($(this).find(".twcostp").val());
var twcostptotal = twcostp*tvalue;
$(this).find(".twcostptotal").val(twcostptotal.toFixed(2));
var tsumlistc =tmcostptotal+twcostptotal;
$(this).find(".tsumlistc").val(tsumlistc.toFixed(2));
var tsumprofit = tsumlist - tsumlistc;
tsumprofitSum();
$(this).find(".tsumprofit").val(tsumprofit.toFixed(2));
}
})

});


$(".tfcustomerl").change(function() {
$("tr").each(function() {
if ($(this).find(".tvalue")) {
var tvalue = Number($(this).find(".tvalue").val());
var tfcostl = Number($(this).find(".tfcostl").val());
var sumvalue = tfcostl *tvalue;
if(sumvalue){sumvalue=sumvalue.toFixed(0);}
else{sumvalue="";}
$(this).find(".tvaluetotal").val(sumvalue);
var tmcost = Number($(this).find(".tmcost").val());
var tmcosttotal=tmcost*sumvalue;
$(this).find(".tmcosttotal").val(tmcosttotal.toFixed(2));
var twcost = Number($(this).find(".twcost").val());
var twcosttotal=twcost*sumvalue;
var tsumlist =tmcosttotal+twcosttotal;
$(this).find(".twcosttotal").val(twcosttotal.toFixed(2));
// ราคากลางรวมแต่ต้องมีฟิวมารับค่า
// var tsumlist =tmcosttotal+twcosttotal;
// tsumlistSum();
// $(this).find(".tsumlist").val(tsumlist);
var tfcustomerl = Number($(this).find(".tfcustomerl").val());
var tmcostc=tmcost*tfcustomerl;
$(this).find(".tmcostc").val(tmcostc.toFixed(2));
var tmcostctotal=tmcostc*sumvalue;
$(this).find(".tmcostctotal").val(tmcostctotal.toFixed(2));
var tfwagel = Number($(this).find(".tfwagel").val());
var twcostc=twcost*tfwagel;
$(this).find(".twcostc").val(twcostc.toFixed(2));
var twcostctotal=twcostc*sumvalue;
$(this).find(".twcostctotal").val(twcostctotal.toFixed(2));
var tsumlist =tmcostctotal+twcostctotal;
tsumlistSum();
$(this).find(".tsumlist").val(tsumlist.toFixed(2));
var tmcostp = Number($(this).find(".tmcostp").val());
var tmcostptotal = tmcostp*tvalue;
$(this).find(".tmcostptotal").val(tmcostptotal.toFixed(2));
var twcostp = Number($(this).find(".twcostp").val());
var twcostptotal = twcostp*tvalue;
$(this).find(".twcostptotal").val(twcostptotal.toFixed(2));
var tsumlistc =tmcostptotal+twcostptotal;
$(this).find(".tsumlistc").val(tsumlistc.toFixed(2));
var tsumprofit = tsumlist - tsumlistc;
tsumprofitSum();
$(this).find(".tsumprofit").val(tsumprofit.toFixed(2));
}
})

});


$(".tfwagel").change(function() {
$("tr").each(function() {
if ($(this).find(".tvalue")) {
var tvalue = Number($(this).find(".tvalue").val());
var tfcostl = Number($(this).find(".tfcostl").val());
var sumvalue = tfcostl *tvalue;
if(sumvalue){sumvalue=sumvalue.toFixed(0);}
else{sumvalue="";}
$(this).find(".tvaluetotal").val(sumvalue);
var tmcost = Number($(this).find(".tmcost").val());
var tmcosttotal=tmcost*sumvalue;
$(this).find(".tmcosttotal").val(tmcosttotal.toFixed(2));
var twcost = Number($(this).find(".twcost").val());
var twcosttotal=twcost*sumvalue;
var tsumlist =tmcosttotal+twcosttotal;
$(this).find(".twcosttotal").val(twcosttotal.toFixed(2));
// ราคากลางรวมแต่ต้องมีฟิวมารับค่า
// var tsumlist =tmcosttotal+twcosttotal;
// tsumlistSum();
// $(this).find(".tsumlist").val(tsumlist);
var tfcustomerl = Number($(this).find(".tfcustomerl").val());
var tmcostc=tmcost*tfcustomerl;
$(this).find(".tmcostc").val(tmcostc.toFixed(2));
var tmcostctotal=tmcostc*sumvalue;
$(this).find(".tmcostctotal").val(tmcostctotal.toFixed(2));
var tfwagel = Number($(this).find(".tfwagel").val());
var twcostc=twcost*tfwagel;
$(this).find(".twcostc").val(twcostc.toFixed(2));
var twcostctotal=twcostc*sumvalue;
$(this).find(".twcostctotal").val(twcostctotal.toFixed(2));
var tsumlist =tmcostctotal+twcostctotal;
tsumlistSum();
$(this).find(".tsumlist").val(tsumlist.toFixed(2));
var tmcostp = Number($(this).find(".tmcostp").val());
var tmcostptotal = tmcostp*tvalue;
$(this).find(".tmcostptotal").val(tmcostptotal.toFixed(2));
var twcostp = Number($(this).find(".twcostp").val());
var twcostptotal = twcostp*tvalue;
$(this).find(".twcostptotal").val(twcostptotal.toFixed(2));
var tsumlistc =tmcostptotal+twcostptotal;
$(this).find(".tsumlistc").val(tsumlistc.toFixed(2));
var tsumprofit = tsumlist - tsumlistc;
tsumprofitSum();
$(this).find(".tsumprofit").val(tsumprofit.toFixed(2));
}
})

});

//ราคากลางรวม
function tsumlistSum() {
var sum = 0;
$(".tsumlist").each(function () {
if (!isNaN(this.value) && this.value.length != 0) {
sum += Number(this.value);
}
});
$("#tvatl").val((sum*0.07).toFixed(2));
$("#tproductprice").val((sum*0.93).toFixed(2));
$("#tvatl2").val((sum*0.07).toFixed(2));
$("#tsumlists").val(sum.toFixed(2));
$("#tsumlists2").val(sum.toFixed(2));
}
// function tsumlistcSum() {
// var sum = 0;
// $(".tsumlistc").each(function () {
// if (!isNaN(this.value) && this.value.length != 0) {
// sum += Number(this.value);
// }
// });
// $("#tsumlistcs").val(sum.toFixed(2));
// }
function tsumprofitSum() {
var sum = 0;
$(".tsumprofit").each(function () {
if (!isNaN(this.value) && this.value.length != 0) {
sum += Number(this.value);
}
});

$("#tsumprofits").val(sum.toFixed(2));
var vat=$("#tvatl").val();


var tgprofitpant= sum-vat;

$("#tgprofitpant").val(((tgprofitpant).toFixed(2)));
$('#tcostlast').val((($("#tsumlists").val()-tgprofitpant).toFixed(2)));
$("#tpersent").val(((($("#tgprofitpant").val()/$("#tcostlast").val())*100).toFixed(2)));
}



//end ready functions
});
function numberWithCommas(x) {
return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>
{{-- <script src="{{ asset('js/optionslist.min.js') }}"></script> --}}
@endsection