<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use DB;
use App\Models\Design;
use App\Models\Template;
use App\Models\Templatetype;
use App\Models\Templatelist;
use App\Models\Designlist;
use App\Models\Service;
use App\Models\Building;
use App\Models\Pledge;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{    
    public function index()
    {             
        if(strtolower(Auth::user()->user_type) == 'admin'){
            return redirect('/');
        }
       
       $work=DB::table('work')->get();
        return view('service.newproject')->with(['work'=>$work]);
    }
     public function survey()
    {             
       
       
       $work=DB::table('work')->get();
        return view('service.survey')->with(['work'=>$work]);
    }
      public function surveysend()
    {               
       $work=DB::table('work')->get();
        return view('service.surveysend')->with(['work'=>$work]);
    }
      public function pledge()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.pledge')->with(['work'=>$work]);
    }
      public function design()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.design')->with(['work'=>$work]);
    }
      public function waitprice()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.waitprice')->with(['work'=>$work]);
    }

      public function waitbuild()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.waitbuild')->with(['work'=>$work]);
    }
    public function build()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.build')->with(['work'=>$work]);
    }
    public function garuntee()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.garuntee')->with(['work'=>$work]);
    }
     public function endproject()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.endproject')->with(['work'=>$work]);
    }
public function allproject()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.allproject')->with(['work'=>$work]);
    }
    public function working()
    {             
      
       
       $work=DB::table('work')->get();
        return view('service.working')->with(['work'=>$work]);
    }
     public function updatesurveyf($id)
    {             
        
      
       $work=DB::table('work')->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
        ->get();
        return view('service.newprojectE')->with(['work'=>$work])->with(['service'=>$service]);
    }
     public function surveyD($id)
    {             
      
       $work=DB::table('work')->get();
       $user=DB::table('users')
        ->where('user_type','=','member')
        ->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
       ->where('service.service_status','=','การรังวัด')
        ->get();
        return view('service.survey.surveyD')->with(['work'=>$work])->with(['user'=>$user])->with(['service'=>$service]);
    }
    public function surveysendD($id)
    {             
      
       $work=DB::table('work')->get();
       $user=DB::table('users')
        ->where('user_type','=','member')
        ->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
         ->where('service.service_status','=','ส่งงานรังวัด')
        ->get();
        return view('service.survey.surveysendD')->with(['work'=>$work])->with(['user'=>$user])->with(['service'=>$service]);
    }
     public function pledgeD($id)
    {             
      
       $work=DB::table('work')->get();
       
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','มัดจำ')
        ->get();
          $user=DB::table('users')
        ->where('user_type','=','member')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('service/pledge')->with(['work'=>$work]);
       }
          $temp=DB::table('template')
        ->where('service_id','=',$id)->get();
        if(count($temp) === 0){$template="";}
          else{$template=$temp;}
        return view('service.pledge.pledgeD')->with(['work'=>$work])->with(['user'=>$user])->with(['service'=>$service])->with(['pledge'=>$pledge])->with(['template'=>$template]);
    }
     public function designD($id)
    {             
      
       $work=DB::table('work')->get();
        $user=DB::table('users')
        ->where('user_type','=','member')
        ->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','ออกแบบ')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('service/design')->with(['work'=>$work]);
       }
         $de=DB::table('users') ->join('design', 'design.users_id', '=', 'users.id')->where('design.service_id','=',$id)->get();
          if(count($de) === 0){$design="";}
          else{$design=$de;}
        
          $designlist=DB::table('users') ->join('designlist', 'designlist.users_id', '=', 'users.id')
           ->where('designlist.service_id','=',$id)
          ->get();
        $temp=DB::table('template')
        ->where('service_id','=',$id)->get();
        if(count($temp) === 0){$template="";}
          else{$template=$temp;}

        return view('service.design.designD')->with(['user'=>$user])->with(['work'=>$work])->with(['service'=>$service])->with(['pledge'=>$pledge])->with(['design'=>$design])->with(['designlist'=>$designlist])->with(['template'=>$template]);
    }
public function waitpriceD($id)
    {             
      
       $work=DB::table('work')->get();
         $user=DB::table('users')
        ->where('user_type','=','member')
        ->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','รอเสนอราคา')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('service/design')->with(['work'=>$work]);
       }
         $de=DB::table('users') ->join('design', 'design.users_id', '=', 'users.id')->where('design.service_id','=',$id)->get();
          if(count($de) === 0){$design="";}
          else{$design=$de;}
        
          $designlist=DB::table('users') ->join('designlist', 'designlist.users_id', '=', 'users.id')
           ->where('designlist.service_id','=',$id)
          ->get();
        $temp=DB::table('template')
        ->where('service_id','=',$id)->get();
        if(count($temp) === 0){$template="";}
          else{$template=$temp;}

        return view('service.waitprice.waitpriceD')->with(['work'=>$work])->with(['user'=>$user])->with(['service'=>$service])->with(['pledge'=>$pledge])->with(['design'=>$design])->with(['designlist'=>$designlist])->with(['template'=>$template]);
    }
    public function waitbuildD($id)
    {             
      
       $work=DB::table('work')->get();
       
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','เสนอราคาก่อสร้าง')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('service/design')->with(['work'=>$work]);
       }
         $de=DB::table('users') ->join('design', 'design.users_id', '=', 'users.id')->where('design.service_id','=',$id)->get();
          if(count($de) === 0){$design="";}
          else{$design=$de;}
        
          $designlist=DB::table('users') ->join('designlist', 'designlist.users_id', '=', 'users.id')
           ->where('designlist.service_id','=',$id)
          ->get();
        $temp=DB::table('template')
        ->where('service_id','=',$id)->get();
        if(count($temp) === 0){$template="";}
          else{$template=$temp;}

        return view('service.waitbuild.waitbuildD')->with(['work'=>$work])->with(['service'=>$service])->with(['pledge'=>$pledge])->with(['design'=>$design])->with(['designlist'=>$designlist])->with(['template'=>$template]);
    }

 public function buildD($id)
    {             
      
       $work=DB::table('work')->get();
       
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
         ->join('building', 'building.service_id', '=', 'service.service_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','ก่อสร้าง')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('service/design')->with(['work'=>$work]);
       }
         $de=DB::table('users') ->join('design', 'design.users_id', '=', 'users.id')->where('design.service_id','=',$id)->get();
          if(count($de) === 0){$design="";}
          else{$design=$de;}
        
          $designlist=DB::table('users') ->join('designlist', 'designlist.users_id', '=', 'users.id')
           ->where('designlist.service_id','=',$id)
          ->get();
        $temp=DB::table('template')
        ->where('service_id','=',$id)->get();
        if(count($temp) === 0){$template="";}
          else{$template=$temp;}

        return view('service.build.buildD')->with(['work'=>$work])->with(['service'=>$service])->with(['pledge'=>$pledge])->with(['design'=>$design])->with(['designlist'=>$designlist])->with(['template'=>$template]);
    }


    public function garunteeD($id)
    {             
      
       $work=DB::table('work')->get();
       
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
         ->join('building', 'building.service_id', '=', 'service.service_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','ประกัน')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('/')->with(['work'=>$work]);
       }
         $de=DB::table('users') ->join('design', 'design.users_id', '=', 'users.id')->where('design.service_id','=',$id)->get();
          if(count($de) === 0){$design="";}
          else{$design=$de;}
        
          $designlist=DB::table('users') ->join('designlist', 'designlist.users_id', '=', 'users.id')
           ->where('designlist.service_id','=',$id)
          ->get();
        $temp=DB::table('template')
        ->where('service_id','=',$id)->get();
        if(count($temp) === 0){$template="";}
          else{$template=$temp;}

        return view('service.garuntee.garunteeD')->with(['work'=>$work])->with(['service'=>$service])->with(['pledge'=>$pledge])->with(['design'=>$design])->with(['designlist'=>$designlist])->with(['template'=>$template]);
    }

public function endprojectD($id)
    {             
      
       $work=DB::table('work')->get();
       
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
         ->join('building', 'building.service_id', '=', 'service.service_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','จบแล้ว')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('/')->with(['work'=>$work]);
       }
         $de=DB::table('users') ->join('design', 'design.users_id', '=', 'users.id')->where('design.service_id','=',$id)->get();
          if(count($de) === 0){$design="";}
          else{$design=$de;}
        
          $designlist=DB::table('users') ->join('designlist', 'designlist.users_id', '=', 'users.id')
           ->where('designlist.service_id','=',$id)
          ->get();
        $temp=DB::table('template')
        ->where('service_id','=',$id)->get();
        if(count($temp) === 0){$template="";}
          else{$template=$temp;}

        return view('service.endproject.endprojectD')->with(['work'=>$work])->with(['service'=>$service])->with(['pledge'=>$pledge])->with(['design'=>$design])->with(['designlist'=>$designlist])->with(['template'=>$template]);
    }

    public function datatablessurvey()
    {

        $data =DB::select("SELECT s.service_id,s.locationc,s.work_id,s.surveyker,s.service_code,s.namec,s.service_status,s.meetdate,u1.name as name1,u2.name as name2,s.work_id,w.workname,".Auth::user()->id." as loginid  FROM service as s left join users as u1 on s.users_id=u1.id left join users as u2 on s.surveyker=u2.id join work as w on s.work_id=w.id where s.service_status='การรังวัด' order by s.service_code desc")
   
     
    
    ;
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }
     public function datatablessurveysend()
    {

        $data =DB::select("SELECT s.service_id,s.locationc,s.work_id,s.surveyker,s.service_code,s.namec,s.service_status,s.meetdate,u1.name as name1,u2.name as name2,s.work_id,w.workname,".Auth::user()->id." as loginid,s.surveydetail FROM service as s left join users as u1 on s.users_id=u1.id left join users as u2 on s.surveyker=u2.id join work as w on s.work_id=w.id where s.service_status='ส่งงานรังวัด' order by s.service_code desc")
   
     
    
    ;
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }
     public function datatablespledge()
    {
        $data =DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
         ->where('service.service_status','=','มัดจำ')
      ->orderBy('service.service_code','desc')
    
    ->get();
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    } 
    public function datatablesdesign()
    {
          $data=DB::select("select COUNT(design.design_id) as total,service.service_id,users.name,service.namec,work.workname,service.service_code FROM service join users on users.id=service.users_id JOIN work ON work.id=service.work_id left join design on service.service_id=design.service_id where service.service_status='ออกแบบ' group by service.service_id order by service.service_code desc")
            // $data=DB::select("select * FROM service join users on users.id=service.users_id JOIN work ON work.id=service.work_id , (select count(*) as total from design left join service on design.service_id=service.service_id where design.service_id=service.service_id and service.service_status='ออกแบบ' )as total where service.service_status='ออกแบบ' order by service.service_code desc")
    //     $data =DB::table('service')
    //     ->join('users', 'users.id', '=', 'service.users_id') 
    //     ->join('work', 'work.id', '=', 'service.work_id') 
    //      ->where('service.service_status','=','ออกแบบ')
    //   ->orderBy('service.service_code','desc')
    
 ;
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function datatableswaitprice()
    {
    //       $data =DB::table('service')
    //     ->join('users', 'users.id', '=', 'service.users_id') 
    //     ->join('work', 'work.id', '=', 'service.work_id')
    //     ->leftJoin('template','service.service_id' , '=','template.service_id' ) 
    //      ->where('service.service_status','=','รอเสนอราคา')
    //   ->orderBy('service.service_code','desc')
    
    // ->get();
    $data=DB::select("select service.service_id,users.name,service.namec,work.workname,service.service_code,service.service_status,template.template_id FROM service join users on users.id=service.users_id JOIN work ON work.id=service.work_id left join template on template.service_id=service.service_id where service.service_status='รอเสนอราคา' group by service.service_id  order by service.service_code desc");
    
 
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function datatableswaitbuild()
    {
          $data =DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
         ->where('service.service_status','=','เสนอราคาก่อสร้าง')
      ->orderBy('service.service_code','desc')
    
    ->get();
    
 
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }


    public function datatablesbuild()
    {
          $data =DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->join('building', 'building.service_id', '=', 'service.service_id') 
         ->where('service.service_status','=','ก่อสร้าง')
      ->orderBy('service.service_code','desc')
    
    ->get();
    
 
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }

public function datatablesgaruntee()
    {
          $data =DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->join('building', 'building.service_id', '=', 'service.service_id') 
         ->where('service.service_status','=','ประกัน')
      ->orderBy('service.service_code','desc')
    
    ->get();
    
 
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function datatablesendproject()
    {
          $data =DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->join('building', 'building.service_id', '=', 'service.service_id') 
         ->where('service.service_status','=','จบแล้ว')
      ->orderBy('service.service_code','desc')
    
    ->get();
    
 
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }
    public function datatablesallproject()
    {
          $data =DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        
      ->orderBy('service.service_code','desc')
    
    ->get();
    
 
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }
    public function datatablesworking()
    {
          $data =DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_status','!=','จบแล้ว')
        ->where('service.service_status','!=','ไม่สนใจบริการ')
      ->orderBy('service.service_code','desc')
    
    ->get();
    
 
    
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function getDatatables2(OptionsRepository $options)
    {
        $data = $options->getDatatables2();
        $datatables = app('datatables');
         return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function pledgeslips($id)
    {
       
      
       // $data = DB::table('service')->where('options_id','=',$id)->get();
        // $data['title'] = !empty($cate) ? $cate['oname'] : 'เพิ่มข้อมูลบริการ';
        // $data['data'] = !empty($cate) ? $cate : $options->castData();
        $data = $id;
     
       return view('service.pledge.pledgeslips')->with(['data' => $data]);
        
        
    }
    public function designaddf($id)
    {
       
      
        $count = DB::select("select count(*) as Num from design where service_id = ".$id."");
      
        $data = $id;
     
       return view('service.design.designaddf')->with(['data' => $data])->with(['count' => $count]);
        
        
    }
    public function templatef($id)
    {
       $service = DB::select("select * from service where service_id=".$id."");
        foreach($service  as $services){}
        $temp = DB::select("select * from options where work_id=".$services->work_id."");
        if(count($temp)===0){$template="";}
        else{$template=$temp;}
      
        $data = $id;
     
       return view('service.template.templatef')->with(['data' => $data])->with(['template' => $template]);
        
        
    }
      public function designmentf($id)
    {
       
      
        $count = DB::select("select count(*) as Num from design where service_id = ".$id."");
      
        $data = $id;
     
       return view('service.design.designmentf')->with(['data' => $data])->with(['count' => $count]);
        
        
    }
     public function renderForm($id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','มัดจำ')
        ->get();
      
        return view('service.pledge.pledgestatus')->with(['service'=>$service]);     
    }
     public function renderFormsurvey($id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $user=DB::table('users')->where('user_type','=','member')
        ->get();
        $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','การรังวัด')
        ->get();
      
        return view('service.survey.surveystatus')->with(['service'=>$service])->with(['user'=>$user]);     
    }
     public function renderFormsurveysend($id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $user=DB::table('users')->where('user_type','=','member')
        ->get();
        $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','ส่งงานรังวัด')
        ->get();
      
        return view('service.survey.surveysendstatus')->with(['service'=>$service])->with(['user'=>$user]);     
    }
    public function designstatus($id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','ออกแบบ')
        ->get();
      
        return view('service.design.designstatus')->with(['service'=>$service]);     
    }
    public function waitpricestatus($id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','รอเสนอราคา')
        ->get();
      
        return view('service.waitprice.waitpricestatus')->with(['service'=>$service]);     
    }
    public function waitbuildstatus(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','เสนอราคาก่อสร้าง')
        ->get();
      
        return view('service.waitbuild.waitbuildstatus')->with(['service'=>$service]);     
    }

public function buildstatus(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','ก่อสร้าง')
        ->get();
      
        return view('service.build.buildstatus')->with(['service'=>$service]);     
    }
    public function garunteestatus(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','ประกัน')
        ->get();
      
        return view('service.garuntee.garunteestatus')->with(['service'=>$service]);     
    }
public function surveystatusu(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
      
      

         DB::table('service')
          ->where('service_id',$id)
            ->update([
            'service_status'=> 'ส่งงานรังวัด'
        ]);
         return redirect()->action('ServiceController@surveysend');
        
        
    }
    public function surveysendstatusu(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
      
      

         DB::table('service')
          ->where('service_id',$id)
            ->update([
            'service_status'=> 'มัดจำ'
        ]);
         return redirect()->action('ServiceController@pledge');
        
        
    }
    public function pledgestatusu(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        if($request->pledge_status==="ไม่สนใจบริการ"){
            $status="ไม่สนใจบริการ";
        }
        else{
             $status="ออกแบบ";
        }
      

         DB::table('service')
          ->where('service_id',$id)
            ->update([
            'service_status'=> $status
        ]);
         return redirect()->action('ServiceController@design');
        
        
    }
    public function designstatusu(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
       
      

         DB::table('service')
          ->where('service_id',$id)
            ->update([
            'service_status'=> 'รอเสนอราคา'
        ]);
         return redirect()->action('ServiceController@waitprice');
        
        
    }
    public function waitpricestatusu(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
       
      

         DB::table('service')
          ->where('service_id',$id)
            ->update([
            'service_status'=> 'เสนอราคาก่อสร้าง'
        ]);
         return redirect()->action('ServiceController@waitbuild');
        
        
    }
    public function waitbuildstatusu(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
       
            $build=New Building;
            $build->service_id=$id;
            $build->startbuild=$request->startdate;
            $build->planbuild=$request->plandate;
            $build->save();


         DB::table('service')
          ->where('service_id',$id)
            ->update([
            'service_status'=> 'ก่อสร้าง'
        ]);
         return redirect()->action('ServiceController@build');
        
        
    }
public function buildstatusu(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
        $image = $request->file('garunteepic');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/garunteepic/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            DB::table('service')
          ->where('service_id',$id)
            ->update([
            'service_status'=> 'ประกัน' ]);
             DB::table('building')
          ->where('service_id',$id)
            ->update([
            'endbuild'=> $request->enddate,
             'endgaruntee'=> $request->garunteedate,
             'garunteepic'=> $filePath
            
            ]);
         return redirect()->action('ServiceController@garuntee');
        
        
    }
     public function garunteestatusu(Request $request,$id)
    {
        // if(strtolower(Auth::user()->user_type) !== 'admin'){
        //     return redirect('/');
        // }
       
      

         DB::table('service')
          ->where('service_id',$id)
            ->update([
            'service_status'=> 'จบแล้ว'
        ]);
         return redirect()->action('ServiceController@endproject');
        
        
    }


    public function templateupdate(Request $request,$id){
        $template= DB::table("template")->where('template_id','=',$id)->get();
      //    if(count($template) === 0){
      //   return redirect('/');
      //  }
     
        foreach($template as $templates){}  
    if($request->templatelist_id){
    for ($i=0; $i<count($request->templatelist_id); $i++) {

        DB::table('templatelist')
            ->where('templatelist_id',$request->templatelist_id[$i])
            ->update([
                'tfcostl' => $request->tfcostl[$i],
                'tfcustomerl' => $request->tfcustomerl[$i],
                'tfwagel' => $request->tfwagel[$i],
                'tvalue' => $request->tvalue[$i],
                'tvaluetotal' => $request->tvaluetotal[$i],
                'tmcost' => $request->tmcost[$i],
                'tmcosttotal' => $request->tmcosttotal[$i],
                'tmcostc' => $request->tmcostc[$i],
                'tmcostctotal' => $request->tmcostctotal[$i],
                'twcost' => $request->twcost[$i],
                'twcosttotal' => $request->twcosttotal[$i],
                'twcostc' => $request->twcostc[$i],
                'twcostctotal' => $request->twcostctotal[$i],
                'tmcostp' => $request->tmcostp[$i],
                'tmcostptotal' => $request->tmcostptotal[$i],
                'twcostp' => $request->twcostp[$i],
                'twcostptotal' => $request->twcostptotal[$i],
                'tsumlist' => $request->tsumlist[$i],
                'tsumlistc' => $request->tsumlistc[$i],
                'tsumprofit' => $request->tsumprofit[$i],
    
        ]);
           
            

    } 
}
if($request->templatetype_id){
    for($i=0;$i<count($request->templatetype_id);$i++){
                 DB::table('templatetype')
            ->where('templatetype_id',$request->templatetype_id[$i])
            ->update([
                    'tworker'  => $request->tworker[$i],
                 ]);
    }
      DB::table('template')
            ->where('template_id',$id)
            ->update([
                    'tsumlists'  => $request->tsumlists,
                    'tvatl'  => $request->tvatl,
                    'tproductprice'  => $request->tproductprice,
                    'tsumprofits'  => $request->tsumprofits,
                    'tgprofitpant'  => $request->tgprofitpant,
                    'tcostlast'  => $request->tcostlast,
                    'tpersent'  => $request->tpersent,
                 ]);
                }
                   return redirect('service/templatedata/'.$id);
            
        
    }

     public function templatedata($id)
    {
        
       
        $template= DB::table("template")
        ->join('service', 'service.service_id', '=', 'template.service_id')
        ->where('template.template_id','=',$id)->get();
         if(count($template) === 0){
        return redirect('/');
       }
        foreach($template as $templates){}
        $templatetype = DB::table('templatetype')->where('template_id','=',$templates->template_id)
         ->orderBy('templatetype_id','asc')
        ->get();
        $templatelist =
        DB::table('templatelist') 
        ->join('boq', 'templatelist.boq_id', '=', 'boq.id')
        ->join('typesub', 'boq.typesub_id', '=', 'typesub.id')
        ->join('type', 'typesub.type_id', '=', 'type.id')
        ->join('category', 'type.category_id', '=', 'category.id')
        ->where('templatelist.template_id','=',$templates->template_id)
        ->orderBy('templatelist.templatetype_id','asc')
        ->orderBy('category.categorynumber','asc')
        ->orderBy('type.typenumber','asc')->get();
        $check = DB::table('templatelist')->select(DB::raw('count(*) as total'))
        ->where('template_id','=',$templates->template_id)->get();
        $option = DB::table('template')
         ->join('work', 'work.id', '=', 'template.work_id')
         ->where('template.template_id','=',$templates->template_id)->get();
         
        //จัดหมวดตามBOQ
         $category = DB::select("select templatelist.templatetype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname from templatelist 
        join boq on templatelist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id 
        where templatelist.template_id = $templates->template_id  
        group by templatelist.templatetype_id,boq.category_id order by templatelist.templatetype_id,category.categorynumber,type.typenumber asc
        ");
        $type = DB::select("select templatelist.templatetype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname,boq.type_id,type.typenumber,type.typename from templatelist 
        join boq on templatelist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id where templatelist.template_id = $templates->template_id
        group by templatelist.templatetype_id,boq.category_id,boq.type_id order by templatelist.templatetype_id,category.categorynumber,type.typenumber asc");
         $typesub = DB::select("select templatelist.templatetype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname,boq.type_id,type.typenumber,type.typename,boq.typesub_id,typesub.typesubnumber,typesub.typesubname from templatelist 
        join boq on templatelist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id where templatelist.template_id = $templates->template_id  
        group by templatelist.templatetype_id,boq.category_id,boq.type_id,boq.typesub_id  order by templatelist.templatetype_id,category.categorynumber,type.typenumber asc");



    //  print_r($category);
       if($templates->service_status=="รอเสนอราคา"){
           return view('service.waitprice.templatedata')->with(['category'=>$category])->with(['type'=>$type])
         ->with(['typesub'=>$typesub])->with(['option'=>$option])->with(['templatelist'=>$templatelist])->with(['templatetype'=>$templatetype])->with(['check'=>$check]);
       }
        elseif($templates->service_status=="เสนอราคาก่อสร้าง"){
           return view('service.waitbuild.templatedata')->with(['category'=>$category])->with(['type'=>$type])
         ->with(['typesub'=>$typesub])->with(['option'=>$option])->with(['templatelist'=>$templatelist])->with(['templatetype'=>$templatetype])->with(['check'=>$check]);
       }
       elseif($templates->service_status=="ก่อสร้าง"){
           return view('service.build.templatedata')->with(['category'=>$category])->with(['type'=>$type])
         ->with(['typesub'=>$typesub])->with(['option'=>$option])->with(['templatelist'=>$templatelist])->with(['templatetype'=>$templatetype])->with(['check'=>$check]);
       }
       elseif($templates->service_status=="ประกัน"){
           return view('service.garuntee.templatedata')->with(['category'=>$category])->with(['type'=>$type])
         ->with(['typesub'=>$typesub])->with(['option'=>$option])->with(['templatelist'=>$templatelist])->with(['templatetype'=>$templatetype])->with(['check'=>$check]);
       } elseif($templates->service_status=="จบแล้ว"){
           return view('service.endproject.templatedata')->with(['category'=>$category])->with(['type'=>$type])
         ->with(['typesub'=>$typesub])->with(['option'=>$option])->with(['templatelist'=>$templatelist])->with(['templatetype'=>$templatetype])->with(['check'=>$check]);
       }
        else{
        return view('service.template.templatedata')->with(['category'=>$category])->with(['type'=>$type])
         ->with(['typesub'=>$typesub])->with(['option'=>$option])->with(['templatelist'=>$templatelist])->with(['templatetype'=>$templatetype])->with(['check'=>$check]);
        }
        
        
    }
     public function templatelist($id)
    {
        
        $templatetype = DB::table('templatetype')->where('template_id','=',$id)
         ->orderBy('templatetype_id','asc')
        ->get();
     
        $template = DB::table('template')
         ->join('work', 'work.id', '=', 'template.work_id')
         ->where('template.template_id','=',$id)->get();
       
       
        return view('service.template.templatelist')->with(['template'=>$template])->with(['templatetype'=>$templatetype]);
       
        
        
    }

    public function store(Request $request)
    {
         if(strtolower(Auth::user()->user_type) == 'admin'){
            return redirect('/');
        }
        $num=0;
        $year=date('Y');
        $data = DB::table('service')
        ->whereYear('created_at','=',$year)
         ->orderBy('service_id','desc')
         ->take(1)
        ->get();
        //echo($data->service_code);
         foreach ($data as $datas) {$num=$datas->service_code;}
        // if($data){}else{$num=0;}
        $code=$num+1;
        $services = new Service;
        $services->service_code = $code;
        $services->work_id = $request->template;
        $services->namec = $request->namec;
        $services->idcardc = $request->idcardc;
        $services->addressc = $request->addressc;
        $services->telc = $request->telc;
        $services->emailc = $request->emailc;
        $services->locationc = $request->locationc;
        $services->detailc = $request->detailc;
        if($request->meetdate){$services->meetdate = $request->meetdate;}
        $services->users_id = Auth::user()->id;
        $services->service_status = 'การรังวัด';
        $services->save();
        
        return redirect()->action('ServiceController@survey');
        // return response()->json([
        //     'message' => 'บันทึกข้อมูลสำเร็จ',
        //     'status' => 'success',
        // ], 200);
    }
     public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

public function surveyker(Request $request, $id)
    {
        
        // Get current user
     
        
        // Persist user record to database
          DB::table('service')
          ->where('service_id',$id)
            ->update(['meetdate' => $request->meetdate,
            'surveyker'=>$request->surveyker
        ]);
        return redirect('service/survey/');
    }

 public function surveypic(Request $request, $id)
    {
        
        // Get current user
     $data = DB::table('service')->where('service_id','=',$id)->get();
            foreach ($data as $datas) {}

        // Check if a profile image has been uploaded
        if ($request->has('surveypic')) {
           
            if($datas->surveypic){
             
                Storage::delete($datas->surveypic);}
            // Get image file
            $image = $request->file('surveypic');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/surveypic/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            
            // Set user profile image path in database to filePath
           // $user->profile_image = $filePath;
        }else{if($datas->surveypic){$filePath=$datas->surveypic;}else{$filePath='';}}
        
        // Persist user record to database
          DB::table('service')
          ->where('service_id',$id)
            ->update(['surveydetail' => $request->surveydetail,
            'surveyurl'=>$request->surveyurl,
            // 'service_status'=>'รอเสนอราคา/มัดจำ',
        'surveypic' => $filePath
        ]);
        return redirect()->action('ServiceController@surveysend');
    }

     public function designadd(Request $request, $id)
    {
        
        // Get current user
    //  $data = DB::table('design')->where('service_id','=',$id)->get();
    //         foreach ($data as $datas) {}

        // Check if a profile image has been uploaded
        // if ($request->has('designpic')) {
           
        //     if($datas->design_pic){
             
        //         Storage::delete($datas->design_pic);}
            // Get image file
            $image = $request->file('designpic');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/designpic/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            
            // Set user profile image path in database to filePath
       
        // }else{if($datas->design_pic){$filePath=$datas->design_pic;}else{$filePath='';}}
        
        // Persist user record to database
        $design= New Design;
        $design->users_id = Auth::user()->id;
        $design->service_id = $id;
        $design->design_pic = $filePath;
        $design->design_dropbox = $request->design_dropbox;
        $design->save();
       
       
        return redirect('service/designD/'.$id);
            
    }
    public function designment(Request $request, $id){
          $data = DB::table('design')->where('design_id','=',$id)->get();
        foreach ($data as $datas) {}
        $designlist= New Designlist;
        $designlist->users_id = Auth::user()->id;
        $designlist->service_id = $datas->service_id;
        $designlist->design_id = $id;
        $designlist->detail = $request->detail;
        $designlist->save();
      
        return redirect('service/designD/'.$datas->service_id);
    }

    public function designdel($id)
    {
         
        $result = DB::table('design')->where('design_id','=',$id);
         $data = DB::table('design')->where('design_id','=',$id)->get();
        if (empty($result)) {
            return false;
        }
          foreach ($data as $datas) {}
          Storage::delete($datas->design_pic);
      
        $designlist = DB::table('designlist')->where('design_id','=',$id);
         if (($designlist)) {
           $designlist->delete();
        } 
         $result->delete();

       
    }
    public function designmentdel($id)
    {
         
       
        
      
        $designlist = DB::table('designlist')->where('designlist_id','=',$id);
       
         $designlist->delete();

       
    }

    public function updatesurvey(Request $request, $id)
    {
       
     
     
         DB::table('service')
          ->where('service_id',$id)
            ->update(['work_id' => $request->template,
        'namec' => $request->namec,
        'idcardc' => $request->idcardc,
        'addressc' => $request->addressc,
        'telc' => $request->telc,
        'emailc' => $request->emailc,
        'locationc' => $request->locationc]);
       
        return redirect()->action('ServiceController@survey');
        // $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        // $status = $result ? 'success' : 'error';
        // return response()->json([
        //     'message' => $message,
        //     'status' => $status,
        // ], 200);
    }
     public function slipsadd(Request $request, $id)
    {
       
       $pledge = new Pledge;
      
        $pledge->pledge_type = $request->pledge_type;
        $pledge->pledge_price =   number_format((float)str_replace(",", "",$request->price), 2, '.', '');
        $pledge->pledge_persent = $request->persent;
        if(($request->pledge_type)=="price"){
        $pledge->pledge_total = number_format((float)str_replace(",", "",$request->totals), 2, '.', '');
        }
        else{
        $pledge->pledge_total = number_format((float)str_replace(",", "",$request->total), 2, '.', '');
        }
        $pledge->service_id = $id;
         $pledge->save();
       
      $work=DB::table('work')->get();
       $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','มัดจำ')
        ->get();
        if(count($service) === 0){
        return redirect('service/pledge')->with(['work'=>$work]);
       }
        return redirect('service/pledgeD/'.$id)->with(['work'=>$work])->with(['service'=>$service])->with(['pledge'=>$pledge]);
     
       
    }


     public function templatetype($id)
    {
       

         $template = DB::table('template')->where('template_id','=',$id)->get();
      
        return view('service.template.templatetype')->with(['template'=>$template]);
        
        
    }
    public function addtype(Request $request)
    {
        $template = DB::table('template')->where('template_id','=',$request->id)->get();
        foreach($template as $templates){}
        $templatetype= New Templatetype;
        $templatetype->totname=$request->otname;
        $templatetype->template_id=$request->id;
        $templatetype->save();
        
        return redirect('service/templatedata/'.$templates->template_id);
     
    }
     public function deltype($id)
    {
        $template = DB::table('template')->join('templatetype','templatetype.template_id','=','template.template_id')
        ->where('templatetype.templatetype_id','=',$id)
        ->get();
        foreach($template as $templates){}
        $templatetype = DB::table('templatetype')->where('templatetype_id','=',$id);
        $templatetype->delete();
        $templatelist = DB::table('templatelist')->where('templatetype_id','=',$id);
        $templatelist->delete();
         DB::table('template')
            ->where('template_id',$templates->template_id)
            ->update([
                    'tsumlists'  => '',
                    'tvatl'  => '',
                    'tproductprice'  => '',
                    'tsumprofits'  => '',
                    'tgprofitpant'  => '',
                    'tcostlast'  => '',
                    'tpersent'  => '',
                 ]);
         return redirect('service/templatedata/'.$templates->template_id.'');
       
    }
     public function dellist($id)
    {
        $template = DB::table('templatelist')->join('template','template.template_id','=','templatelist.template_id')
        ->where('templatelist.templatelist_id','=',$id)
        ->get();
        foreach($template as $templates){}
       
        $templatelist = DB::table('templatelist')->where('templatelist_id','=',$id);
        $templatelist->delete();
            DB::table('template')
            ->where('template_id',$templates->template_id)
            ->update([
                    'tsumlists'  => '',
                    'tvatl'  => '',
                    'tproductprice'  => '',
                    'tsumprofits'  => '',
                    'tgprofitpant'  => '',
                    'tcostlast'  => '',
                    'tpersent'  => '',
                 ]);
                
         return redirect('service/templatedata/'.$templates->template_id.'');
       
    }

    public function templateadd(Request $request, $id)
    {
       if(empty($request->template)){
        return redirect('service/pledgeD/'.$id);
       }
    $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          // ->where('service.service_status','=','รอเสนอราคา/มัดจำ')
        ->get();
        if(count($service) === 0){
        return redirect('service/pledge')->with(['work'=>$work]);
       }
      $option=DB::table("options")->where('options_id','=',$request->template)->get();
      $optiontype=DB::table("optionstype")->where('options_id','=',$request->template)->get();
     $optionlist=DB::table("optionslist")
     ->join('boq','boq.id','=','optionslist.boq_id')
     ->join('optionstype','optionstype.optionstype_id','=','optionslist.optionstype_id')->where('optionslist.options_id','=',$request->template)->get();
     foreach($option as $options){}
    // foreach($service as $services){}
     $template= New Template;
     $template->tname=$options->oname;
      $template->tgaruntee=$options->garuntee;
      $template->tgname1=$options->gname1;
      $template->tgname2=$options->gname2;
      $template->tgname3=$options->gname3;
      $template->tgcomment=$options->comment;
      $template->tdetail=$options->detail;
      $template->tservice=$options->service;
      $template->tprofit=$options->profit;
      $template->tvat=$options->vat;
      $template->tfcost=$options->fcost;
      $template->tfcustomer=$options->fcustomer;
      $template->tfwage=$options->fwage;
      $template->work_id=$options->work_id;
      $template->options_id=$options->options_id;
      $template->service_id=$id;
      $template->save();
      $tem=DB::select('select * from template order by  created_at desc limit 1');
      foreach($tem as $tems){}
      foreach($optiontype as $optiontypes){
        $templatetype= New Templatetype;
        $templatetype->template_id=$tems->template_id;
        $templatetype->totname=$optiontypes->otname;
        $templatetype->optionstype_id=$optiontypes->optionstype_id;
        $templatetype->save();
      }
      foreach($optionlist as $optionlists){
          $temt=DB::select("select * from templatetype where optionstype_id=".$optionlists->optionstype_id."");
          foreach ($temt as $temts) {
            $templatelist= New Templatelist;
            $templatelist->template_id=$temts->template_id;
            $templatelist->templatetype_id=$temts->templatetype_id;
            $templatelist->boq_id=$optionlists->boq_id;
            $templatelist->tlist=$optionlists->list;
             $templatelist->tcomment=$optionlists->comment;
             $templatelist->tfcostl=$tems->tfcost;
             $templatelist->tfcustomerl=$tems->tfcustomer;
             $templatelist->tfwagel=$tems->tfwage;
             $templatelist->tunit=$optionlists->unit;
             $templatelist->tmcost=$optionlists->mcost;
             $templatelist->twcost=$optionlists->wcost;
             $templatelist->tmcostp=$optionlists->mcostp;
             $templatelist->twcostp=$optionlists->wcostp;
            $templatelist->save();
          }
      }
      $work=DB::table('work')->get();
       $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
       
        return redirect('service/templatedata/'.$tems->service_id);
   
       
    }
    
    public function addlistboq(Request $request,$id)
    {
        $template = DB::select("select * from template where template_id=".$id."");
        foreach($template as $templates){}
        if(!$request->get('boq')){return redirect('service/templatedata/'.$templates->service_id);}
        $items = $request->get('boq');
         foreach($items as $item){
        $boq = DB::select("select * from boq where id=".$item."");
        foreach ($boq as $boqs) {
            # code...
       
        $templatelist = new Templatelist;
        $templatelist->template_id = $request->id;
        $templatelist->templatetype_id = $request->template;
        $templatelist->boq_id = $boqs->id;
        $templatelist->tlist=$boqs->list;
        $templatelist->tcomment=$boqs->comment;
        $templatelist->tfcostl=$templates->tfcost;
        $templatelist->tfcustomerl=$templates->tfcustomer;
        $templatelist->tfwagel=$templates->tfwage;
        $templatelist->tunit=$boqs->unit;
        $templatelist->tmcost=$boqs->mcost;
        $templatelist->twcost=$boqs->wcost;
        $templatelist->tmcostp=$boqs->mcostp;
        $templatelist->twcostp=$boqs->wcostp;
        $templatelist->save();
     }
         }
           return redirect('service/templatedata/'.$templates->template_id);
    }

    public function delete($id)
    {
         
        $result = DB::table('service')->where('service_id','=',$id);
        if (empty($result)) {
            return false;
        }
        $result->delete();
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }
    public function deletepledge($id)
    { 
        $result = DB::table('service')->where('service_id','=',$id);
        if (empty($result)) {
            return false;
        }
          $data = DB::table('service')->where('service_id','=',$id)->get();
            foreach ($data as $datas) {}
            if($datas->surveypic){
           
                Storage::delete($datas->surveypic);}
       
        $result->delete();
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function pledgeslipsdel($id)
    { 
        $result = DB::table('pledge')->where('service_id','=',$id);
        if (empty($result)) {
            return false;
        }
            $work=DB::table('work')->get();
       
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
          ->where('service.service_status','=','มัดจำ')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('service/pledge')->with(['work'=>$work]);
       }
       
        $result->delete();
   
    }
       public function pledgeprint($id)
    { 
        // $result = DB::table('pledge')->where('service_id','=',$id);
        // if (empty($result)) {
        //     return false;
        // }
        $work=DB::table('work')->get();
        $bank=DB::table('bank')->get();
       $company=DB::table('company')->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
        //   ->where('service.service_status','=','รอเสนอราคา/มัดจำ')
        ->get();
         $pledge=DB::table('pledge')
       ->where('service_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('service/pledge')->with(['work'=>$work]);
       }
       
   return view('service.pledge.pledgeprint')->with(['work'=>$work])->with(['bank'=>$bank])->with(['company'=>$company])
        ->with(['service'=>$service])->with(['pledge'=>$pledge]);;
   
    }

     public function surveyprint($id)
    { 
        // $result = DB::table('pledge')->where('service_id','=',$id);
        // if (empty($result)) {
        //     return false;
        // }
        $work=DB::table('work')->get();
    
       $company=DB::table('company')->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
        //   ->where('service.service_status','=','รอเสนอราคา/มัดจำ')
        ->get();
        
        if(count($service) === 0){
        return redirect('/')->with(['work'=>$work]);
       }
       
   return view('service.survey.surveyprint')->with(['work'=>$work])->with(['company'=>$company])
        ->with(['service'=>$service]);
   
    }


    public function tworkerprint($id)
    { 
        // $result = DB::table('pledge')->where('service_id','=',$id);
        // if (empty($result)) {
        //     return false;
        // }
      $work=DB::table('work')->get();
        $bank=DB::table('bank')->get();
       $company=DB::table('company')->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->join('building', 'building.service_id', '=', 'service.service_id') 
         ->join('template', 'template.service_id', '=', 'service.service_id') 
         ->join('templatetype', 'templatetype.template_id', '=', 'template.template_id') 
        ->where('templatetype.templatetype_id','=',$id)
        //   ->where('service.service_status','=','รอเสนอราคา/มัดจำ')
        ->get();
         $template=DB::table('template')
       ->where('service_id','=',$id)->get();
       foreach($template as $templates){}
         $templatetype=DB::table('templatetype')
       ->where('templatetype_id','=',$id)->orderBy('templatetype_id','asc')->get();
        $templatelist=DB::table('templatelist')
       ->where('templatetype_id','=',$id)->get();
        if(count($service) === 0){
        return redirect('/');
       }
       
   return view('service.build.tworkerprint')->with(['work'=>$work])->with(['bank'=>$bank])->with(['company'=>$company])
        ->with(['service'=>$service])->with(['template'=>$template])->with(['templatetype'=>$templatetype])->with(['templatelist'=>$templatelist]);
   
    }

    public function buildprint($id)
    { 
        // $result = DB::table('pledge')->where('service_id','=',$id);
        // if (empty($result)) {
        //     return false;
        // }
      $work=DB::table('work')->get();
        $bank=DB::table('bank')->get();
       $company=DB::table('company')->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->join('building', 'building.service_id', '=', 'service.service_id') 
        ->where('service.service_id','=',$id)
        //   ->where('service.service_status','=','รอเสนอราคา/มัดจำ')
        ->get();
        $template=DB::table('template')
       ->where('service_id','=',$id)->get();
       foreach($template as $templates){}
         $templatetype=DB::table('templatetype')
       ->where('template_id','=',$templates->template_id)->orderBy('templatetype_id','asc')->get();
        $templatelist=DB::table('templatelist')
       ->where('template_id','=',$templates->template_id)->get();
        if(count($service) === 0){
        return redirect('/');
       }
       
   return view('service.build.buildprint')->with(['work'=>$work])->with(['bank'=>$bank])->with(['company'=>$company])
        ->with(['service'=>$service])->with(['template'=>$template])->with(['templatetype'=>$templatetype])->with(['templatelist'=>$templatelist]);
   
    }

     public function templateprint($id)
    { 
        // $result = DB::table('pledge')->where('service_id','=',$id);
        // if (empty($result)) {
        //     return false;
        // }
        $work=DB::table('work')->get();
        $bank=DB::table('bank')->get();
       $company=DB::table('company')->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
        //   ->where('service.service_status','=','รอเสนอราคา/มัดจำ')
        ->get();
         $template=DB::table('template')
       ->where('service_id','=',$id)->get();
       foreach($template as $templates){}
         $templatetype=DB::table('templatetype')
       ->where('template_id','=',$templates->template_id)->orderBy('templatetype_id','asc')->get();
        $templatelist=DB::table('templatelist')
       ->where('template_id','=',$templates->template_id)->get();
        if(count($service) === 0){
        return redirect('/');
       }
       
   return view('service.template.templateprint')->with(['work'=>$work])->with(['bank'=>$bank])->with(['company'=>$company])
        ->with(['service'=>$service])->with(['template'=>$template])->with(['templatetype'=>$templatetype])->with(['templatelist'=>$templatelist]);
   
    }
    public function templateprints($id)
    { 
        // $result = DB::table('pledge')->where('service_id','=',$id);
        // if (empty($result)) {
        //     return false;
        // }
        $work=DB::table('work')->get();
        $bank=DB::table('bank')->get();
       $company=DB::table('company')->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$id)
        //   ->where('service.service_status','=','รอเสนอราคา/มัดจำ')
        ->get();
         $template=DB::table('template')
       ->where('service_id','=',$id)->get();
       foreach($template as $templates){}
         $templatetype=DB::table('templatetype')
       ->where('template_id','=',$templates->template_id)->orderBy('templatetype_id','asc')->get();
        $templatelist=DB::table('templatelist')
       ->where('template_id','=',$templates->template_id)->get();
        if(count($service) === 0){
        return redirect('/');
       }
       
   return view('service.template.templateprints')->with(['work'=>$work])->with(['bank'=>$bank])->with(['company'=>$company])
        ->with(['service'=>$service])->with(['template'=>$template])->with(['templatetype'=>$templatetype])->with(['templatelist'=>$templatelist]);
   
    }

    public function templatedifprint($id)
    { 
         $template= DB::table("template")
        ->join('service', 'service.service_id', '=', 'template.service_id')
        ->where('template.template_id','=',$id)->get();
         if(count($template) === 0){
        return redirect('/');
       }
        foreach($template as $templates){}
        $work=DB::table('work')->get();
        $bank=DB::table('bank')->get();
       $company=DB::table('company')->get();
       $service=DB::table('service')
        ->join('users', 'users.id', '=', 'service.users_id') 
        ->join('work', 'work.id', '=', 'service.work_id') 
        ->where('service.service_id','=',$templates->service_id)
       
        ->get();
         $templatetype = DB::table('templatetype')
          ->join('templatelist', 'templatetype.templatetype_id', '=', 'templatelist.templatetype_id')
        ->where('templatelist.template_id','=',$templates->template_id)
        ->where('templatelist.tvalue','!=','0.00')
        ->whereNotNull('templatelist.tvalue')
         ->orderBy('templatetype.templatetype_id','asc')
        ->get();
        $templatelist =
        DB::table('templatelist') 
        ->join('boq', 'templatelist.boq_id', '=', 'boq.id')
        ->join('typesub', 'boq.typesub_id', '=', 'typesub.id')
        ->join('type', 'typesub.type_id', '=', 'type.id')
        ->join('category', 'type.category_id', '=', 'category.id')
        ->where('templatelist.template_id','=',$templates->template_id)
        ->where('templatelist.tvalue','!=','0.00')
        ->whereNotNull('templatelist.tvalue')
        ->orderBy('templatelist.templatetype_id','asc')
        ->orderBy('category.categorynumber','asc')
        ->orderBy('type.typenumber','asc')->get();
    
        //จัดหมวดตามBOQ
         $category = DB::select("select templatelist.templatetype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname from templatelist 
        join boq on templatelist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id 
        where templatelist.template_id = $templates->template_id and templatelist.tvalue != '0.00' and  templatelist.tvalue IS NOT NULL
        group by templatelist.templatetype_id,boq.category_id order by templatelist.templatetype_id,category.categorynumber,type.typenumber asc
        ");
        $type = DB::select("select templatelist.templatetype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname,boq.type_id,type.typenumber,type.typename from templatelist 
        join boq on templatelist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id where templatelist.template_id = $templates->template_id and templatelist.tvalue != '0.00' and  templatelist.tvalue IS NOT NULL
        group by templatelist.templatetype_id,boq.category_id,boq.type_id order by templatelist.templatetype_id,category.categorynumber,type.typenumber asc");
         $typesub = DB::select("select templatelist.templatetype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname,boq.type_id,type.typenumber,type.typename,boq.typesub_id,typesub.typesubnumber,typesub.typesubname from templatelist 
        join boq on templatelist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id where templatelist.template_id = $templates->template_id  and templatelist.tvalue != '0.00' and  templatelist.tvalue IS NOT NULL
        group by templatelist.templatetype_id,boq.category_id,boq.type_id,boq.typesub_id  order by templatelist.templatetype_id,category.categorynumber,type.typenumber asc");

       
   return view('service.template.templatedifprint')->with(['work'=>$work])->with(['bank'=>$bank])->with(['company'=>$company])
        ->with(['service'=>$service])->with(['template'=>$template])->with(['templatetype'=>$templatetype])->with(['templatelist'=>$templatelist])
        ->with(['category'=>$category])->with(['type'=>$type])
         ->with(['typesub'=>$typesub]);
   
    }
      
  
}
