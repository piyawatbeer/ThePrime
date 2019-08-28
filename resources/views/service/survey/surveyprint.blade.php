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
        @page {
            margin: 0;
            font-family: sans-serif;
        }

        body {
            margin: 1.6cm;
            font-family: sans-serif;
        }
    }
</style>

<div id="app">
    @foreach ($company as $companys)@endforeach
    @foreach ($work as $works)@endforeach

    @foreach ($service as $services)@endforeach
    {{-- @foreach ($pledge as $pledges)@endforeach --}}
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
 if($services->meetdate){
 $date =  date('d-m-Y', strtotime($services->meetdate));
}else{
 $date="";}

?>


    <div class="row">
        <div class="col text-center">
            <div style="font-size:20pt; font-family: Roboto; font-family: Roboto;">
                รายการรังวัดพื้นที่
            </div>
        </div>
    </div>
    <table class="table  display   text-center" id="categorysub-table" width="100%" cellspacing="0">
        <tr>
            <td style="vertical-align:middle"><img src="{{URL::asset('/img/logoprime.png')}}" class="img-thumbnail"
                    alt="profile Pic" height="100%" width="100%"></td>
            <td width="60%" class="text-left"><b>หมายเลข:</b>
                <?php $num='';
for($i=3;$i>count((array)$services->service_code);$i--){
$num=$num.'0';
}
echo $num.$services->service_code;?>

                <br> <b>ชื่อลูกค้า: </b>{{'คุณ'.$services->namec}}
                <br> <b>ที่อยู่: </b>{{$services->addressc}}
                <br> <b>เบอร์โทร: </b>{{$services->telc}}

            </td>
            <td width="30%" class="text-left">
                <b>นัดวันที่: </b>{{$date}}
                <br>
                <b>ประเภทงาน: </b>{{$services->workname}}
            </td>
        </tr>
        <tr>
            <td colspan="3">

                <div class="row">
                    <img src="/storage/pdf/survey.jpg" width="100%" height="100%">
                </div>
            </td>
        </tr>
    </table>
    
</div>

{{-- ajax model --}}

@include('layouts.modal')

@endsection @section('script')
{{-- <script src="{{ asset('js/categorysub.min.js') }}"></script> --}}
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection
<script type="text/javascript">
    var delayInMilliseconds = 800; //1 second
       
    document.title = "รายการรังวัดพื้นที่ คุณ{{$services->namec}}";

setTimeout(function() {
window.print();
window.close();
}, delayInMilliseconds);


</script>