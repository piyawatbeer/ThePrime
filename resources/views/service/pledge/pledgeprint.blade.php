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
        .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100px;
        color: black;
        text-align: center;
        }
        .table-bordered thead th {
        background: #b8daff !important;
        }
        @page {
            margin: 0;
          
        }

        body {
            margin: 1.6cm;


        }
        .page {
        page-break-after: always;
        
        }
    }
</style>

<div id="app" class="page">
    @foreach ($company as $companys)@endforeach
    @foreach ($work as $works)@endforeach

    @foreach ($service as $services)@endforeach
    @foreach ($pledge as $pledges)@endforeach
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
   
    <div class="row">
        <div class="col text-center">
          <div style="font-size:20pt; font-family: Roboto; ">
               ใบเสนอราคาและสัญญาว่าจ้างออกแบบและเขียนแบบ
            </div>
        </div>
    </div>
    <hr style="border: 3px solid black;">
    
    <div class="row">
        <div class="col">
            <div class="col text-left" style="font-size:13pt; font-family: Roboto; ">
                <b>เรื่อง &emsp;เสนอราคาและสัญญาว่าจ้างออกแบบและเขียนแบบ</b>
            </div>
        </div>
        
        <div class="col text-right" style="font-size:13pt; font-family: Roboto; "> วันที่
            ...{{date("d")}}... เดือน
            ...{{date("m")}}... พ.ศ.
            ...{{(date("Y")+543)}}...
        </div>
      
    </div>
    <div class="row">
        <div class="col" style="font-size:13pt; font-family: Roboto;  text-align:justify;
       text-justify:inter-cluster; ">
            &emsp;&emsp;&emsp;&emsp;หนังสือสัญญาฉบับนี้ทำขึ้นระหว่าง {{$services->namec}} เลขประจำตัวผู้เสียภาษี {{$services->idcardc}} อยู่ที่ {{$services->addressc}} ซึ่งต่อไปในสัญญานี้จะเรียกว่า "ผู้ว่าจ้าง" ฝ่ายหนึ่งกับ {{$companys->comname}}  สำนักงานตั้งอยู่เลขที่
            {{ $companys->address ." โทรศัพท์ ".$companys->tel}}
            ซึ่งต่อไปในสัญญานี้จะเรียกว่า "ผู้รับจ้าง" อีกฝ่ายหนึ่ง ทั้งสองฝ่ายได้ตกลงกันดังมีข้อความต่อไปนี้ <br/>
        </div>
    </div>
    <div class="row" style="padding:15px;">
    </div>
    <table class="table  display table-bordered  text-center" id="categorysub-table" width="100%" cellspacing="0">
        <thead>
            <tr class="table-primary">
                <th scope="col" width="50px">ลำดับ</th>
                <th scope="col">รายการ</th>
                <th scope="col" width="120px">จำนวน</th>
                <th scope="col" width="120px">หน่วย</th>
                <th scope="col" width="120px">ราคา/หน่วย</th>
                <th scope="col" width="180px">จำนวนเงิน</th>
            </tr>
        </thead>
        <tbody>
            <tr height="400px">
                <td>1</td>
                <td class="text-left">ค่ามัดจำ
                    <?php if($pledges->pledge_type=="price"){}
                                                    else{ echo $pledges->pledge_persent." % ของจำนวนเงิน ".number_format($pledges->pledge_price,2);}?>
                </td>
                <td>1</td>
                <td>สัญญา</td>
                <td><?php echo number_format($pledges->pledge_total,2);?></td>
                <td><?php echo number_format($pledges->pledge_total,2);?></td>

            </tr>
            <tr>
                <td class="text-left" colspan="3" rowspan="1">
                    {{-- <b>หมายเหตุ: </b>สามารถติดต่อชำระเงินผ่านช่องทางนี้
                    <br>
                    @foreach ($bank as $banks)
                    <br> <img src="{{URL::asset('/storage/'.$banks->pic)}}" class="img-thumbnail" alt="profile Pic"
                        height="40px" width="40px">
                    <font size="-1"> {{$banks->bname." ชื่อบัญชี: ".$banks->name." เลขบัญชี: ".$banks->number}}</font>
                    @endforeach --}}

                </td>
                <td colspan="2" class="text-right"><b>ยอดสุทธิ</b></td>
                <td><?php echo number_format($pledges->pledge_total,2);?></td>
            </tr>
           
            <tr>
                <td class="align-bottom" colspan="3"><b>ตัวอักษร ( {{Convert($pledges->pledge_total)}})</b></td>
                <td colspan="2" class="text-right"><b>รวม</b></td>
                <td><b><?php echo number_format($pledges->pledge_total,2);?></b></td>
            </tr>
        </tbody>
    </table>
    <div class="row" style="padding:50px;font-size:13pt; font-family: Roboto; ">
        <div class="col-md-6 text-center">
            ลงชื่อ..............................ผู้ว่าจ้าง
            
            <br><br>
            ( ...{{$services->namec}}... )
        </div>
        <div class="col-md-6 text-center">
           
            ลงชื่อ..................................ผู้รับจ้าง
      
            <br><br>
            ( ................................ )
            <br><br>
            {{'ผู้มีอำนาจลงนาม '.$companys->comname}}
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 text-center">Line: @primere<br>
           <img src="{{URL::asset('/img/qrprime.png')}}" height="230px" width="250px">
        </div>
        <div class="col-md-6 text-center">
    
         <img src="{{URL::asset('/img/bankprime.png')}}"  height="250px" width="450px">
        </div>
    
    </div>
   
<div class="footer">
    <p style="font-size:13pt; font-family: Roboto; ">สามารถดูผลงานเพิ่มเติมได้ที่ Fanpage : https://www.facebook.com/ThePrimeRE/ ขอขอบคุณที่ให้ความสนใจบริการของเรา</p>
</div>
</div>
<div id="app" class="page" style="padding-top:50px;" >
    <div class="row">
        <div class="col text-center">
            <div style="font-size:13pt; font-family: Roboto; ">
                รายละเอียดแนบท้าย (ออกแบบและเขียนแบบ)
            </div>
        </div>
    </div>
    <hr style="border: 3px solid black;">

    <div class="row">
        <div class="col text-left">
            <div style="font-size:13pt; font-family: Roboto;  text-align:justify;
       text-justify:inter-cluster;">
               <b>เงื่อนไขประกอบการเสนอราคาและทำสัญญาจ้างออกแบบและเขียนแบบ</b><br>
               - เมื่อทำสัญญาออกแบบและเขียนแบบแล้ว ผู้ว่าจ้างสามารถแก้ไขแบบร่างได้ทั้งหมดไม่เกิน 2 ครั้ง 
               (เริ่มนับตั้งแต่ได้รับข้อมูลการออกแบบเพื่อนำมาเขียนแบบร่างครั้งที่ 1) หากมีการแก้ไขเกิน 2 ครั้งคิดค่าบริการครั้งละ 10% ของมูลค่างานออกแบบ <br>
               - กำหนดยืนราคา 30 วัน นับตั้งแต่วันที่เสนอราคารอบสุดท้ายที่ตกลงกัน <br>
               - แบบร่าง ประกอบไปด้วย <br>
                
                    &emsp;&emsp;1.รูปภาพ 3 มิติเสมือนจริง <br>
                    &emsp;&emsp;2.แปลน <br>
                    &emsp;&emsp;3.โมเดลคอมพิวเตอร์ 3 มิติ <br>
                    <br>
                    <b>หมายเหตุ</b><br>
                    <font color="red">&emsp;&emsp;1.ราคานี้อาจมีการเปลี่ยนแปลงขึ้นอยู่กับการออกแบบและเขียนแบบตามที่ลูกค้าต้องการ<br>
                    &emsp;&emsp;2.หากบริษัทได้รับความไว้วางใจจากผู้ว่าจ้างให้เป็นผู้ดำเนินการก่อสร้างตามแบบ บริษัทจะทำการหักค่าออกแบบและเขียนแบบทั้งหมดให้เป็นการสมนาคุณ ซึ่งจะคืนให้เป็นส่วนลดในงานงวดสุดท้ายของก่อสร้าง
                    </font>
            </div>
        </div>
    </div>
    <div class="row" style="padding:80px;font-size:13pt; font-family: Roboto; ">
        <div class="col-md-6 text-center">
            ลงชื่อ..............................ผู้ว่าจ้าง
    
            <br><br>
            ( ...{{$services->namec}}... )
        </div>
        <div class="col-md-6 text-center">
    
            ลงชื่อ..................................ผู้รับจ้าง
    
            <br><br>
            ( ................................ )
            <br><br>
            {{'ผู้มีอำนาจลงนาม '.$companys->comname}}
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
    var delayInMilliseconds = 800; //1 second
    document.title = "ใบเสนอราคาและสัญญาว่าจ้างออกแบบและเขียนแบบ{{'คุณ'.$services->namec}}";

    setTimeout(function() {
    window.print();
    window.close();
    }, delayInMilliseconds);


</script>