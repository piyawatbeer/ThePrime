@extends('layouts.print')
@section('content')
<style>
    /* body {
        margin: 1.6cm;


    } */

    /*
    page {
    
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }

    page[size="A4"][layout="portrait"] {
        width: 29.7cm;
        height: 21cm;
    }

    page[size="A3"] {
        width: 29.7cm;
        height: 42cm;
    }

    page[size="A3"][layout="portrait"] {
        width: 42cm;
        height: 29.7cm;
    }

    page[size="A5"] {
        width: 14.8cm;
        height: 21cm;
    }

    page[size="A5"][layout="portrait"] {
        width: 21cm;
        height: 14.8cm;
    } */

    @media print {
        .table-bordered thead th {
        background: #b8daff !important;
        }
        @page {
            margin: 0;
        }

        body {
            margin: 1.6cm;


        }
    }

</style>

<div id="app">
    @foreach ($company as $companys)@endforeach
    @foreach ($work as $works)@endforeach

    @foreach ($service as $services)@endforeach
    @foreach ($template as $templates)@endforeach
    <?php
    
function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
}

function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
## วิธีใช้งาน

// echo  $num1  . "&nbsp;=&nbsp;" .Convert($num1),"<br>"; 
// echo  $num2  . "&nbsp;=&nbsp;" .Convert($num2),"<br>"; 
?>

    <div class="row">
        <div class="col-sm-2 text-right"><img src="{{URL::asset('/img/logoprime.png')}}" class="img-thumbnail"
                alt="profile Pic" height="125px" width="125px"></div>
        <div class="col-sm-10"><span>
                <h3>{{$companys->comname}}</h3>
            </span>
            {{$companys->address." โทร: ".$companys->tel}}
            <br>Facebook: {{$companys->facebook." Line: ".$companys->line." E-mail: ".$companys->email}}

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col text-center">
            <h1>ใบเสนอราคา
            </h1>
        </div>
    </div>
    <table class="table  display table-bordered  text-center" id="categorysub-table" width="100%" cellspacing="0">
        <tr>
            <td width="100%" class="text-left"><b>หมายเลข:</b>
                <?php $num='';
for($i=3;$i>count((array)$services->service_code);$i--){
$num=$num.'0';
}
echo $num.$services->service_code;?>
                <b> วันที่: </b>{{ date('d/m/Y')}}
                <br> <b>ชื่อลูกค้า: </b>{{'คุณ'.$services->namec}}
                <br> <b>ชื่อบริษัท: </b>{{$companys->comname}}
                <br> <b>เลขที่ผู้เสียภาษี: </b>{{$companys->idcard}}
                <br> <b>ชื่องาน: </b>{{ $templates->tname." ".$templates->tgaruntee}}
            </td>
        </tr>
    </table>
    <table class="table  display table-bordered  text-center" id="categorysub-table" width="100%" cellspacing="0">
        <thead>
            <tr class="table-primary">
                <th class="align-middle" scope="col" width="40px">ลำดับ</th>
                <th class="align-middle" scope="col" width="400px">รายการ</th>
                <th class="align-middle" scope="col" width="60px">จำนวน</th>
                <th class="align-middle" scope="col" width="80px">หน่วย</th>
                <th class="align-middle" scope="col" width="100px">ค่าวัสดุ</th>
                <th class="align-middle" scope="col" width="100px">ค่าวัสดุรวม</th>
                <th class="align-middle" scope="col" width="100px">ค่าแรง</th>
                <th class="align-middle" scope="col" width="100px">ค่าแรงรวม</th>
                <th class="align-middle" scope="col" width="120px">จำนวนเงิน</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($templatetype as $templatetypes)
            <tr>
                <td class="textcenter">
                    <b>
                        <font size="3">{{substr($templatetypes->totname,0,1)}}</font>
                    </b>
                </td>
                <td class="text-left" colspan="8">
                    <b>
                        <font size="3">{{trim(substr($templatetypes->totname,1))}}</font>
                    </b>
                </td>
                {{-- <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
               --}}
            </tr>
            <?php $i=0;?>
            @foreach ($templatelist as $templatelists)
            @if($templatetypes->templatetype_id==$templatelists->templatetype_id)

            <tr>
                <td class="textcenter">
                    <font size="3"> {{++$i}}</font>
                </td>
                <td class="text-left">
                    <font size="3">{{ $templatelists->tlist}}</font>



                </td>
                <td>
                    <font size="3">{{ $templatelists->tvalue}}</font>
                </td>
                <td>
                    <font size="3">{{ $templatelists->tunit}}</font>
                </td>
                <td>
                    <font size="3">{{number_format($templatelists->tmcostc,2)}}</font>
                </td>
                <td>
                    <font size="3">{{number_format($templatelists->tmcostctotal,2)}}</font>
                </td>
                <td>
                    <font size="3">{{number_format($templatelists->twcostc,2)}}</font>
                </td>
                <td>
                    <font size="3">
                        {{number_format($templatelists->twcostctotal,2)}}<?php //echo number_format($pledges->pledge_total,2);?>
                    </font>
                </td>
                <td>
                    <font size="3">
                        {{number_format($templatelists->tsumlist,2)}}<?php //echo number_format($pledges->pledge_total,2);?>
                    </font>
                </td>

            </tr>
            @endif
            @endforeach
            @endforeach
            {{-- <tr height="300px">
                <td></td>
                <td class="text-left">
                
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr> --}}
            <tr>
                <td class="text-left" colspan="6" rowspan="3"><b>หมายเหตุ: </b>สามารถติดต่อชำระเงินผ่านช่องทางนี้
                    <br>
                    @foreach ($bank as $banks)
                    <br> <img src="{{URL::asset('/storage/'.$banks->pic)}}" class="img-thumbnail" alt="profile Pic"
                        height="40px" width="40px">
                    <font size="3"> {{$banks->bname." ชื่อบัญชี: ".$banks->name." เลขบัญชี: ".$banks->number}}</font>
                    @endforeach

                </td>
                <td colspan="2" class="text-right"><b>
                        <font size="3">ยอดสุทธิ</font>
                    </b></td>
                <td>
                    <font size="3"><?php echo number_format($templates->tsumlists,2);?></font>
                </td>
            </tr>
            <tr>

                <td colspan="2" class="text-right"><b>
                        <font size="3">สินค้าและบริการ</font>
                    </b></td>
                <td>
                    <font size="3"><?php echo number_format(($templates->tproductprice),2);?></font>
                </td>
            </tr>
            <tr>

                <td colspan="2" class="text-right"><b>
                        <font size="3">ภาษีมูลค่าเพิ่ม 7%</font>
                    </b></td>
                <td>
                    <font size="3"><?php echo number_format(($templates->tvatl),2);?></font>
                </td>
            </tr>
            <tr>
                <td class="align-bottom" colspan="6"><b>
                        <font size="3">ตัวอักษร (
                            {{Convert($templates->tsumlists)}}
                            )</font>
                    </b></td>
                <td colspan="2" class="text-right"><b>
                        <font size="3">รวม</font>
                    </b></td>
                <td>
                    <font size="3"><b><?php echo number_format($templates->tsumlists,2);?></b></font>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row" style="padding:50px;">
        <div class="col-md-8"></div>
        <div class="col-md-4 text-center">ผู้เสนอราคา
            <br>
            <br>
            <br>
            ----------------------------

            <br>
            ( {{Auth::user()->name}} )
            <br>
            {{$companys->comname}}
        </div>

    </div>

</div>

{{-- ajax model --}}

@include('layouts.modal')

@endsection @section('script')
{{-- <script src="{{ asset('js/categorysub.min.js') }}"></script> --}}
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection
<script type="text/javascript">
    document.title = "ใบเสนอราคาลูกค้า";
    var delayInMilliseconds = 800; //1 second

setTimeout(function() {
window.print();
window.close();
}, delayInMilliseconds);


</script>