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
    /* html,body{height:100%;width:100%;margin:0;padding:0;} */


    @page {
        size: A4 landscape;
        max-height: 100%;
        max-width: 100%
    }

    @media print {
        .table-bordered th {
            background-color: #b8daff !important;
        }

        .table-bordered td.worker {
            background-color: lightgray !important;
        }

        .table-bordered td.category {
            background-color: paleturquoise !important;
        }

        .table-bordered td.customer {
            background-color: violet !important;
        }

        .table-bordered td.prime {
            background-color: wheat !important;
        }
    }

    /* body { */
    /* margin: 1.6cm; */
    /* transform: rotate(-90deg); */

    /* } */

    /* @media print {
        @page {
            margin: 0;
        }

        body {
            margin: 1.6cm;


        }
    } */
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
                <div style="font-size:20pt; font-family: Roboto; ">{{$companys->comname}}</div>
            </span>
            {{$companys->address." โทร: ".$companys->tel}}
            <br>Facebook: {{$companys->facebook." Line: ".$companys->line." E-mail: ".$companys->email}}

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col text-center" style="font-size:20pt; font-family: Roboto; ">
            ใบเปรียบเทียบรายการปริมาณงานและราคา

        </div>
    </div>
    <table class="table  display  text-center" id="categorysub-table" width="100%" cellspacing="0">
        <tr>
            <td width="100%" class="text-left"><b>หมายเลข:</b>
                <?php $num='';
for($i=3;$i>count((array)$services->service_code);$i--){
$num=$num.'0';
}
echo $num.$services->service_code;?>
                <b> วันที่: </b>{{ date('d/m/Y')}}
                <br> <b>ชื่อลูกค้า: </b>{{'คุณ'.$services->namec}}
                <br> <b>ประมาณราคารายการ: </b>{{ $templates->tname}}
                <br> <b>สถานที่ก่อสร้าง/ปรับปรุงซ่อมแซม: </b>{{$services->addressc}}
            </td>
        </tr>
    </table>

    <table class="table  display table-bordered  text-center" style="font-size:10px;" id="categorysub-table"
        width="100%" cellspacing="0">
        {{-- <thead> --}}
        <tr>
            <td scope="col" class="customer" colspan="15"><b>
                    <font size="3">ลูกค้า</font>
                </b></td>
            <td scope="col" class="prime" colspan="6"><b>
                    <font size="3">Prime</font>
                </b></td>
        </tr>
        <tr class="table-primary">
            <th scope="col" width="40px">ลำดับ</th>
            <th scope="col" width="150px">รายการ</th>
            {{-- <th scope="col">จำนวน</th>
                <th scope="col">ต้นทุน</th> --}}
            <th scope="col">จำนวนรวม</th>
            <th scope="col">หน่วย</th>
            <th scope="col">ค่าวัสดุ</th>
            <th scope="col">ค่าวัสดุรวม</th>
            <th scope="col">ค่าแรง</th>
            <th scope="col">ค่าแรงรวม</th>
            {{-- <th scope="col" width="100px">หมายเหตุ</th> --}}
            <th scope="col" class="bg-cream">ลูกค้า</th>
            <th scope="col" class="bg-cream">ค่าวัสดุ</th>
            <th scope="col" class="bg-cream">ค่าวัสดุรวม</th>
            <th scope="col" class="bg-cream">จ้างช่าง</th>
            <th scope="col" class="bg-cream">ค่าแรง</th>
            <th scope="col" class="bg-cream">ค่าแรงรวม</th>
            <th scope="col" class="bg-cream">รวมเป็นเงิน</th>
            <th scope="col" class="bg-sky prime">ต้นทุน</th>
            <th scope="col" class="bg-sky prime">ต้นทุนรวม</th>
            <th scope="col" class="bg-sky prime">จ้างช่าง</th>
            <th scope="col" class="bg-sky prime">จ้างช่างรวม</th>
            <th scope="col" class="bg-sky prime">รวมเป็นเงิน</th>
            <th scope="col" class="bg-sky prime" width="100px">ส่วนต่างกำไร</th>
        </tr>
        {{-- </thead> --}}
        <tbody>
            <?php $j=0;?>
            @foreach ($templatetype as $templatetypes)
            <tr>
                <td class="text-left worker" colspan="5">
                    <b>
                        {{$templatetypes->totname}}
                    </b>
                </td>
                <td class="text-left worker" colspan="18"><b>ช่างที่รับงาน :</b>


                    {{$templatetypes->tworker}}
                </td>


            </tr>
            </tr>
            @foreach ($category as $categorys)
            @if(($categorys->templatetype_id)==($templatetypes->templatetype_id))
            <tr>
                <td class="category">{{$categorys->categorynumber}}
                </td>
                <td colspan="23" class="text-left category">{{$categorys->categoryname}}
                </td>
            </tr>
            @foreach ($type as $types)
            @if(($types->category_id)==($categorys->category_id)&&($categorys->templatetype_id)==($types->templatetype_id))
            <tr>
                <td>{{$types->typenumber}}
                </td>
                <td colspan="23" class="text-left">{{$types->typename}}
                </td>
            </tr>
            @foreach ($typesub as $typesubs)
            @if(($typesubs->type_id)==($types->type_id)&&($types->category_id)==($typesubs->category_id)&&($typesubs->templatetype_id)==($types->templatetype_id))
            <tr>
                <td>
                </td>
                <td colspan="23" class="text-left">{{$typesubs->typesubnumber." ".$typesubs->typesubname}}
                </td>
            </tr>

            <?php $i=0; $j++;$sum=0;$sumw=0;$sump=0;$sumgp=0;?>
            @foreach ($templatelist as $templatelists)
            @if(($templatelists->typesub_id)==($typesubs->typesub_id)&&($typesubs->type_id)==($templatelists->type_id)&&($templatelists->category_id)==($typesubs->category_id)&&($typesubs->templatetype_id)==($templatelists->templatetype_id))

            <td>{{++$i}}</td>
            <td class="text-left">{{$templatelists->tlist}} </td>

            {{-- <td class="text-center">{{$templatelists->tvalue}}</td>
            <td>{{$templatelists->tfcostl}} --}}
            <td>{{$templatelists->tvaluetotal}}</td>
            <td>{{$templatelists->tunit}}</td>
            <td>{{number_format($templatelists->tmcost,0)}}</td>
            <td>{{number_format($templatelists->tmcosttotal,0)}}</td>
            <td>{{number_format($templatelists->twcost,0)}}</td>
            <td>{{number_format($templatelists->twcosttotal,0)}}</td>
            {{-- <td>{{$templatelists->tcomment}}</td> --}}
            <td class="bg-cream">{{number_format($templatelists->tfcustomerl,0)}}
            </td>
            <td class="bg-cream">{{number_format($templatelists->tmcostc,0)}}</td>
            <td class="bg-cream">{{number_format($templatelists->tmcostctotal,0)}}</td>
            <td class="bg-cream">{{number_format($templatelists->tfwagel,0)}}</td>
            <td class="bg-cream">{{number_format($templatelists->twcostc,0)}}</td>
            <td class="bg-cream">{{number_format($templatelists->twcostctotal,0)}}</td>
            <td class="bg-cream">{{number_format($templatelists->tsumlist,0)}}</td>
            <td class="bg-sky prime">{{number_format($templatelists->tmcostp,0)}}</td>
            <td class="bg-sky prime">{{number_format($templatelists->tmcostptotal,0)}}</td>
            <td class="bg-sky prime">{{number_format($templatelists->twcostp,0)}}</td>
            <td class="bg-sky prime">{{number_format($templatelists->twcostptotal,0)}}</td>
            <td class="bg-sky prime">{{number_format($templatelists->tsumlistc,0)}}</td>
            <td class="bg-sky prime">{{number_format($templatelists->tsumprofit,0)}}</td>
            <?php 
                $sum=$sum+$templatelists->tsumlist;
                $sumw=$sumw+$templatelists->twcostptotal;
                $sump=$sump+$templatelists->tsumlistc;
                $sumgp=$sumgp+$templatelists->tsumprofit;
            ?>
            </tr>
            @else
            {{-- <tr>
                                        <td colspan="6" height="40px"></td>
                                    </tr> --}}
            @endif

            @endforeach
            <tr>
                <td></td>
                <td class="text-left">รวม {{$categorys->categoryname}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{number_format($sum,2)}}</td>
                <td class="prime"></td>
                <td class="prime"></td>
                <td class="prime"></td>
                <td class="prime">{{number_format($sumw,2)}}</td>
                <td class="prime">{{number_format($sump,2)}}</td>
                <td class="prime">{{number_format($sumgp,2)}}</td>
            </tr>
            @endif
            @endforeach
            @endif
            @endforeach
            @endif
            @endforeach
            @endforeach

            <tr>




                <td scope="col" class="text-right" colspan="14"><b>ยอดสุทธิ</b></td>
                <td scope="col">{{number_format($templates->tsumlists,2)}}</td>
                <td scope="col" colspan="5" class="text-right"><b>รวมทั้งหมด</b></td>
                <td scope="col">{{number_format($templates->tsumprofits,2)}}</td>

            </tr>
            <tr>




                <td scope="col" class="text-right" colspan="14"><b>สินค้าแลบริการ</b></td>
                <td scope="col">{{number_format($templates->tproductprice,2)}}</td>
                <td scope="col" colspan="5" class="text-right"><b>ภาษี 7%</b></td>
                <td scope="col">{{number_format($templates->tvatl,2)}}</td>

            </tr>
            <tr>




                <td scope="col" class="text-right" colspan="14"><b>ภาษี 7%</b></td>
                <td scope="col">{{number_format($templates->tvatl,2)}}</td>
                <td scope="col" colspan="5" class="text-right"><b>กำไรคาดการณ์</b></td>
                <td scope="col">{{number_format($templates->tgprofitpant,2)}}</td>

            </tr>
            <tr>




                <td scope="col" class="text-right" colspan="14"><b>รวมทั้งหมด</b></td>
                <td scope="col">{{number_format($templates->tsumlists,2)}}</td>
                <td scope="col" colspan="5" class="text-right"><b>ต้นทุน</b></td>
                <td scope="col">{{number_format($templates->tcostlast,2)}}</td>

            </tr>
            <tr>





                <td scope="col" colspan="20" class="text-right"><b>สัดส่วนกำไร %</b></td>
                <td scope="col">{{$templates->tpersent}}</td>

            </tr>

            {{-- <tr height="300px">
                <td></td>
                <td class="text-left">
                
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr> --}}

        </tbody>
    </table>
    {{-- <div class="row" style="padding:50px;">
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

</div> --}}

</div>

{{-- ajax model --}}

@include('layouts.modal')

@endsection @section('script')
{{-- <script src="{{ asset('js/categorysub.min.js') }}"></script> --}}
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection
<script type="text/javascript">
    document.title = "ใบเปรียบเทียบรายการปริมาณงานและราคา{{'คุณ'.$services->namec}}";
    var delayInMilliseconds = 800; //1 second

setTimeout(function() {
window.print();
window.close();
}, delayInMilliseconds);


</script>