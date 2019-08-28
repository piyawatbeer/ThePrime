@extends('layouts.app') @section('title', 'ผู้ใช้งาน') @section('content')
<div id="app">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-users"></i>
            <span>
                <a href="/options"> Template </a> > ข้อมูล Template

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
                        <a href="#" data-href="{{ url('options/type/'.$options->options_id.'') }}"
                            data-modal-name="ajaxModal" role="button" class="btn btn-success btn-create"><i
                                class="fas fa-plus-circle"></i> เพิ่มประเภทงาน
                        </a>

                        <a href="{{ url('options/listboq/'.$options->options_id.'') }}" role="button"
                            class="btn btn-success">
                            <i class="fas fa-plus-circle"></i> เพิ่มรายการ
                        </a>
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


                            {{$options->oname}}


                        </li>
                        <li class="list-group-item">

                            <b>การรับประกัน (วัน):</b>


                            {{$options->garuntee}}


                        </li>
                        <li class="list-group-item">

                            <b>รายละเอียด :</b>


                            {{$options->detail}}

                        </li>
                        <li class="list-group-item">

                            <b>เงื่อนไขการมัดจำ :</b>


                            {{$options->gname1}}

                        </li>
                        <li class="list-group-item">

                            <b>เงื่อนไขการเสนอราคา :</b>


                            {{$options->gname2}}

                        </li>
                        <li class="list-group-item">

                            <b>เงื่อนไขการประกัน :</b>


                            {{$options->gname3}}

                        </li>
                        <li class="list-group-item">

                            <b>หมายเหตุ :</b>


                            {{$options->comment}}

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
                                        <b>Service :</b><br>


                                        {{$options->service}}
                                    </div>
                                    <div class="col-sm-6">
                                        <b>ปริมาณ :</b><br>


                                        {{$options->fcost}}
                                    </div>
                                </div>
                            </li>


                            <li class="list-group-item">
                                <div class="row text-center">
                                    <div class="col-sm-6">
                                        <b>Profit :</b><br>


                                        {{$options->profit}}
                                    </div>
                                    <div class="col-sm-6">
                                        <b>ราคาวัสดุลูกค้า :</b><br>


                                        {{$options->fcustomer}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row text-center">
                                    <div class="col-sm-6">
                                        <b>Vat :</b><br>

                                        </label>
                                        {{$options->vat}}
                                    </div>
                                    <div class="col-sm-6">
                                        <b>ราคาแรงลูกค้า :</b><br>

                                        </label>
                                        {{$options->fwage}}
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- <form id="saveForm" method="post" action="/options/list/{{$options->options_id}}" autocomplete="off"> --}}
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-sm-12 text-center">
            <div class="sailorTableArea">

                <table class="table table-hover text-center sailorTable" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" width="40px">ลำดับ</th>
                            <th scope="col">รายการ</th>
                            <th scope="col">หน่วย</th>
                            <th scope="col">ค่าวัสด</th>
                            <th scope="col">ค่าแรง</th>
                            <th scope="col">ต้นทุน</th>
                            <th scope="col">จ้างช่าง</th>
                            <th scope="col" width="100px">หมายเหตุ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($optiontype as $key=>$optionstype)
                        <tr>
                            <td class="text-left" style="background:lightgray;" colspan="8">{{$optionstype->otname}} <a
                                    href="#" class="btn btn-outline-danger btn-sm btn-delete" title="ลบประเภทงาน"
                                    onclick="event.preventDefault();
                                
                                // var name = $(this).data('name');
                                var callback = function () {
                                window.location.replace('{{ url('/options/deltype/'.$optionstype->optionstype_id.'') }}');
                                }
                            confirmBox('ลบข้อมูล {{$optionstype->otname}}', callback);
                                
                                "><i class="fa fa-trash"></i></a></td>
                        </tr>




                        <?php $i=0; $j=0;?>
                        @foreach ($optionlist as $optionslist)
                        {{-- @foreach ($category as $categorys)  --}}





                        {{-- @endforeach --}}
                        @if(($optionslist->optionstype_id)==($optionstype->optionstype_id))

                        @foreach ($category as $categorys)

                        @if(

                        $categorys->optionstype_id==$optionslist->optionstype_id)

                        @foreach ($type as $types)

                        @if(

                        ($types->category_id==$optionslist->category_id)&&$types->optionstype_id==$optionslist->optionstype_id)
                        <?php $i++; $j++;?>
                      
                        @foreach ($typesub as $typesubs)
                        @if(
                        ($typesubs->category_id==$types->category_id)&&$typesubs->optionstype_id==$types->optionstype_id&&$typesubs->type_id==$optionslist->type_id)
                        
                        
                          @foreach ($boq as $boqs)
                        @if(
                        
                        ($boqs->category_id==$types->category_id)&&$boqs->optionstype_id==$types->optionstype_id&&$boqs->type_id==$typesubs->type_id&&$boqs->typesub_id==$optionslist->typesub_id)
                       
                        
                        @if($j==1)

                        <tr>
                            <td>{{$types->categorynumber}}</td>
                            <td class="text-left" colspan="7">
                                {{$types->categoryname." ".$types->numrows." ".$categorys->numrows}}</td>
                        </tr>
                        @else
                        @if($j==$categorys->numrows)
                        <?php $i=1;$j=1;?>
                        <tr>
                            <td>{{$types->categorynumber}}</td>
                            <td class="text-left" colspan="7">
                                {{$types->categoryname." ".$types->numrows." ".$categorys->numrows}}</td>
                        </tr>
                        @endif
                        @endif
                        @if($j==1)
                        <tr>
                            <td>{{$typesubs->typenumber}}</td>
                            <td class="text-left" colspan="7">{{$typesubs->typename." ".$typesubs->numrows." ".$types->numrows}}</td>
                        </tr>
                        @else
                        @if($j==$types->numrows)
                        <?php //$i=1;$j=1;?>
                       <tr>
                            <td>{{$typesubs->typenumber}}</td>
                            <td class="text-left" colspan="7">{{$typesubs->typename." ".$typesubs->numrows." ".$types->numrows}}</td>
                        </tr>
                        @endif
                        @endif
                        @if($j==1)
                        <tr>
                            <td></td>
                            <td class="text-left" colspan="7">
                                {{$boqs->typesubnumber." ".$boqs->typesubname." ".$boqs->numrows." ".$typesubs->numrows}}</td>
                        </tr>
                        @else
                        @if($j==$typesubs->numrows)
                        <?php //$i=1;$j=1;?>
                        <tr>
                            <td></td>
                            <td class="text-left" colspan="7">
                                {{$boqs->typesubnumber." ".$boqs->typesubname." ".$boqs->numrows." ".$typesubs->numrows}}</td>
                        </tr>
                        @endif
                        @endif
                      @endif
                        @endforeach

                        @endif
                        @endforeach
                        
                       
                        @endif
                        @endforeach
                        {{-- @else  --}}
                        <?php //$i=0;?>
                        @endif

                        @endforeach

                        <tr>
                            <td>{{$i}}</td>
                            <td class="text-left">{{$optionslist->list}} <a href="#"
                                    class="btn btn-outline-danger btn-sm btn-delete" title="ลบรายการ" onclick="event.preventDefault();
                                                        
                                                        // var name = $(this).data('name');
                                                        var callback = function () {
                                                        window.location.replace('{{ url('/options/dellist/'.$optionslist->optionslist_id.'') }}');
                                                        }
                                                    confirmBox('ลบข้อมูล {{$optionslist->list}}', callback);
                                                        
                                                        "><i class="fa fa-trash"></i></a></td>
                            <td>{{$optionslist->unit}}</td>
                            <td>{{$optionslist->mcost}}</td>
                            <td>{{$optionslist->wcostp}}</td>
                            <td>{{$optionslist->mcostp}}</td>
                            <td>{{$optionslist->wcost}}</td>
                            <td>{{$optionslist->comment}}</td>
                        </tr>
                        {{-- @endif
                                @endif --}}


                        @else
                        {{-- <tr>
                            <td colspan="6" height="40px"></td>
                        </tr> --}}
                        @endif

                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-12 text-center">
            <a href="{{ url('options/') }}"> <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-arrow-left"></i> ย้อนกลับ</button></a>
            {{-- <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button> --}}
        </div>
    </div>
    {{-- </form> --}}
</div>

{{-- ajax model --}}
@include('layouts.modal')

@endsection @section('script')
{{-- <script src="{{ asset('js/optionslist.min.js') }}"></script> --}}
@endsection