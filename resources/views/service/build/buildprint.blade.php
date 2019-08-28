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
            margin: 2cm;
        }

        body {
            margin: 0cm;
        }
    }
</style>

<div id="app">
    @foreach ($company as $companys)@endforeach


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
    <table border="0px">
        <tr>
            <td>
                <div class="row">
                    <div class="col-sm-2 text-right"><img src="{{URL::asset('/img/logoprime.png')}}"
                            class="img-thumbnail" alt="profile Pic" height="125px" width="125px"></div>
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
                        <h3><b>หนังสือสัญญาจ้าง</b>
                        </h3>
                        <br>
                        <div style="font-size:1.5rem;"><b> โครงการ {{$services->workname}} </b></div>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col text-right" style="font-size:1.4rem;"> ทำที่
                        .................................................... </div>
                </div>
                <br>
                <div class="row">
                    <div class="col text-right" style="font-size:1.4rem; "> วันที่ ...{{date("d")}}... เดือน
                        ...{{date("m")}}... ปีพ.ศ.
                        ...{{(date("Y")+543)}}...
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col" style="font-size:1.3rem; text-align:justify;
   text-justify:inter-cluster; ">
                        &emsp;&emsp;หนังสือสัญญาฉบับนี้ทำขึ้นระหว่าง ...{{$companys->comname}}... โดยนาย/นาง/นางสาว
                        ...{{$companys->mname}}... กรรมการผู้มีอำนาจทำการแทน สำนักงานตั้งอยู่เลขที่
                        {{ $companys->address }}
                        ซึ่งต่อไปในสัญญานี้จะเรียกว่า "ผู้รับจ้าง "
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="font-size:1.3rem; 
    text-justify:distribute; text-align:justify; ">
                        &emsp;&emsp;ฝ่ายหนึ่งกับ นาย/นาง/นางสาว ...{{$services->namec}}... เลขที่
                        {{$services->addressc}} ซึ่งต่อไปสัญญานี้จะเรียกว่า
                        "ผู้ว่าจ้าง" อีกฝ่ายหนึ่ง ทั้งสองฝ่ายได้ตกลงทำสัญญาจ้างเหมาก่อสร้างกันโดยมีข้อความดังต่อไปนี้
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="font-size:1.3rem; 
        text-justify:distribute; text-align:justify; padding-top:10px;">
                        &emsp;&emsp;ข้อ 1. ผู้ว่าจ้างตกลงจ้างผู้รับจ้างให้ทำการปลูกสร้าง ในโครงการ
                        {{$services->workname}} ที่อยู่ {{$services->addressc}}
                        การงานที่ว่าจ้างมีรายละเอียดดังใบเสนอราคาแนบนี้<br><br>
                    </div>
                </div>


                <div class="row">
                    <div class="col" style="font-size:1.3rem; 
        text-justify:distribute; text-align:justify; padding-top:10px;">
                        &emsp;&emsp;ข้อ 2. การตกลงของผู้รับจ้าง <br>
                        &emsp;&emsp;ผู้รับจ้างตกลงรับจ้างก่อสร้างตามที่กำหนดในใบเสนอราคาแนบนี้ โดยสัญญาว่าจะจัดหาสิ่งของ
                        วัสดุ สัมภาระที่ดี ใช้เครื่องมือดี
                        และช่างฝีมือดี เพื่อทำการก่อสร้างตามสัญญานี้จนแล้วเสร็จ
                    </div>
                </div>

                <div class="row">
                    <div class="col" style="font-size:1.3rem; 
            text-justify:distribute; text-align:justify; padding-top:10px;">
                        &emsp;&emsp;ข้อ 3. ค่าจ้างและการจ่ายค่าจ้าง <br>
                        &emsp;&emsp;การจ้างตามสัญญานี้ ผู้ว่าจ้างและผู้รับจ้างตกลงจ้างเหมา
                        รวมทั้งวัสดุสิ่งของสัมภาระและค่าแรงงานและภาษีต่างๆ
                        รวมเป็นเงินทั้งสิ้น {{number_format($templates->tsumlists,2)}} บาท
                        ( {{Convert($templates->tsumlists)}} )ตามรายละเอียดในใบเสนอราคาแนบนี้
                    </div>
                </div>
                <?php  $date =  date('d-m-Y', strtotime($services->startbuild));
            $dates= explode("-",$date); 
            $date2 = date('d-m-Y', strtotime($services->planbuild));
            $dates2= explode("-",$date2);

            $datef = \Carbon\Carbon::parse(($services->startbuild))->diff(\Carbon\Carbon::parse(($services->planbuild)))->days;
            
            ?>
                <div class="row">
                    <div class="col" style="font-size:1.3rem; 
                text-justify:distribute; text-align:justify; padding-top:10px;">
                        &emsp;&emsp;ข้อ 4. ระยะเวลาในการทำงาน <br>
                        &emsp;&emsp;ผู้รับจ้างสัญญาว่าจะเริ่มลงมือทำงาน ณ
                        สถานที่ที่กำหนดตั้งแต่วันที่ {{$dates[0]}} เดือน {{$dates[1]}} พ.ศ. {{$dates[2]+543}}
                        และจะทำงานให้แล้วเสร็จสมบูรณ์
                        และส่งมอบงานให้แก่ผู้ว่าจ้างภายในวันที่ {{$dates2[0]}} เดือน {{$dates2[1]}} พ.ศ.
                        {{$dates2[2]+543}}

                        รวมเป็นระยะเวลาก่อสร้าง {{$datef}} วัน
                        ถ้าผู้รับจ้างมิได้ลงมือทำงานภายในกำหนดระยะเวลาก็ดีหรือมีเหตุให้เชื่อถือได้ว่า
                        ผู้รับจ้างไม่สามารถทำงานภายในกำหนดระยะเวลาดังกล่าวก็ดี หรือมีเหตุให้เชื่อถือได้ว่า
                        ผู้รับจ้างไม่สามารถทำงานให้แล้วเสร็จสมบูรณ์ภายในกำหนดเวลาก็ดี หรือล่วงกำหนดเวลา แล้วเสร็จ
                        บริบูรณ์ไปแล้วก็ดี
                        ผู้ว่าจ้างมีสิทธิบอกเลิกสัญญานี้ได้ และมีอำนาจจ้างผู้อื่นทำงานจ้างนี้ต่อจากผู้รับจ้างได้
                        การที่ผู้ว่าจ้างไม่ใช้สิทธิบอกเลิกสัญญาตามวรรคหนึ่ง ไม่เป็นเหตุให้ผู้รับจ้างพ้น จากความรับผิด
                        ตามสัญญานี้
                    </div>
                </div>

                <div class="row">
                    <div class="col" style="font-size:1.3rem; 
            text-justify:distribute; text-align:justify; padding-top:10px;">
                        &emsp;&emsp;ข้อ 5. หน้าที่ของผู้ว่าจ้างหรือตัวแทนของผู้ว่าจ้าง <br>
                        &emsp;&emsp;5.1 ผู้ว่าจ้างตกลงจ่ายค่าจ้าง เมื่อผู้รับจ้างได้ส่งมอบงานครบถ้วนถูกต้องตามรูปแบบ
                        และรายละเอียดในแต่ละงวดงาน
                        และผู้ว่าจ้างหรือตัวแทนของผู้ว่าจ้างได้ทำการตรวจรับเรียบร้อยแล้ว โดยชำระให้ภายใน 7 วัน <br>
                        &emsp;&emsp;5.2 ผู้ว่าจ้างมีสิทธิที่จำทำการแก้ไขเพิ่มเติมหรือลดงานจากรูปแบบ
                        และรายการก่อสร้างเดิม หรือเปลี่ยนแปลงวัสดุ อุปกรณ์ต่างๆ
                        ได้ทุกอย่างโดยไม่ต้องบอกเลิกสัญญานี้ การเพิ่มหรือลดงานจะต้องคิดราคากำหนดเวลา กำหนดชำระเงิน
                        ผู้ว่าจ้างและผู้รับจ้างจะต้องตกลงกันเป็นลายลักษณ์อักษรทุกครั้ง
                        บันทึกหรือข้อตกลงดังกล่าวให้ถือเป็นส่วนหนึ่งของสัญญานี้ด้วย <br>
                        &emsp;&emsp;5.3 ผู้ว่าจ้างมีอำนาจและสิทธิสั่งหยุดงานก่อสร้างได้เป็นลายลักษณ์อักษร
                        เมื่อเห็นว่างานที่ผู้รับจ้างปฏิบัตินั้นไม่ถูกต้องตามแบบแปลนและรายละเอียดประกอบแบบ <br>
                        &emsp;&emsp;5.4 ผู้ว่าจ้างมีอำนาจและหน้าที่ในการสั่งรื้อทำใหม่ แก้ไข
                        หรือซ่อมแซมงานที่ได้ทำไปแล้ว แต่ไม่ได้คุณภาพฝีมือตามต้องการ
                        หรือใช้วัสดุหรือกระทำไม่ถูกต้องตามแบบแปลนและข้อกำหนดประกอบแบบโดยคำสั่งเป็นลายลักษณ์อักษรถึงผู้รับจ้าง
                    </div>
                </div>





                <div class="row" style="padding:50px;">
                    <div class="col-md-8"></div>

                    <div class="col-md-4 text-center">
                        <br>
                        ลงชื่อ..............................................ผู้ว่าจ้าง<br><br>
                        (............{{$services->namec}}.............)<br>
                        <br><br><br>
                        ลงชื่อ..............................................ผู้รับจ้าง<br><br>
                        (....{{$companys->mname}}....)<br>
                        บริษัท....{{$companys->comname}}....<br>

                        <br><br><br>
                        ลงชื่อ.............................................. พยาน<br><br>
                        (......................................................)<br>
                        <br><br><br>
                        ลงชื่อ.............................................. พยาน<br><br>
                        (......................................................)<br>

                    </div>

                </div>

</div>
</td>
</tr>
</table>
{{-- ajax model --}}

@include('layouts.modal')

@endsection @section('script')
{{-- <script src="{{ asset('js/categorysub.min.js') }}"></script> --}}
{{-- <script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script> --}}
@endsection
<script type="text/javascript">
    var delayInMilliseconds = 800; //1 second
    document.title = "หนังสือสัญญาจ้าง";

setTimeout(function() {
window.print();
window.close();
}, delayInMilliseconds);


</script>