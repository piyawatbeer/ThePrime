<?php

namespace App\Http\Controllers;

use App\Repositories\BoqRepository;
use Illuminate\Http\Request;
use App\Models\Categorysub;
use App\Models\Typesub;
use App\Models\Part;
use App\Models\Partsub;
use App\Models\Group;
use App\Models\Category;
use App\Models\Boqchange;
use Illuminate\Support\Facades\Auth;
use DB;

class BoqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {
         if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        //
        //   $query=DB::table('typesub')
    // ->join('boq', 'boq.typesub_id', '=', 'typesub.id')
    //   ->join('type','type.id','=','boq.type_id')
    //   ->join('category', 'category.id', '=','type.category_id')
    //    ->join('group', 'group.id', '=', 'category.group_id')
    //   ->orderBy('category.categorynumber','asc')
    // ->get();
    //    echo"<pre>";
    //    print_r($query);
    return view('boq.index');
    }
    
    public function history(){
        $history=DB::select('SELECT * FROM boqchange ORDER BY id DESC'); 
        
        return view('boq.boqhistory')->with(['history' => $history]);
    }

    public function getDatatables(BoqRepository $boq)
    {
        $data = $boq->getDatatables();
        $datatables = app('datatables');
        //  echo"<pre>";
       // print_r($data);
       
        return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
    }

public function historyDatatables(BoqRepository $boq)
    {
      
        //  echo"<pre>";
       // print_r($data);
       $history = (!empty($_GET["history"])) ? ($_GET["history"]) : ('');
        if($history){
          $data = $boq->historyDatatables();
        $datatables = app('datatables');
        return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
        }   
        else{
            //  return $datatables::of($data)
            // ->blacklist(0)
            // ->make(false);
        }
    }


     public function findGroup($id)
    {
        $group = Group::where('part_id',$id)->get();
        return response()->json($group);
    }
      public function findCategory($id)
    {
        $cat = Category::where('group_id',$id)->get();
        return response()->json($cat);
    }

    public function findCategorysub($id)
    {
        $cat = Category::where('id',$id)->get();
        return response()->json($cat);
    }

    public function findtype($id)
    {
        $cat = Categorysub::where('category_id',$id)->get();
        return response()->json($cat);
    }
    public function findtypes($id)
    {
        $cat = Categorysub::where('id',$id)->get();
        return response()->json($cat);
    }
    public function findtypesub($id)
    {
        $cat = Typesub::where('type_id',$id)->get();
        return response()->json($cat);
    }

    public function renderForm(BoqRepository $boq, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        //$country_list = DB::table('part');
        $parts=Part::all();
        $cate = $boq->getById($id);
        $groups=Group::all();
        $types=Categorysub::all();
        $categorys=Category::all();
        $typesubs=Typesub::all();

        $data['title'] = !empty($cate) ? $cate['list'] : 'เพิ่มข้อมูลราคา';
        $data['data'] = !empty($cate) ? $cate : $boq->castData();
        $data['parts'] = $parts;
        $data['groups'] = $groups;
        $data['categorys'] = $categorys;
        $data['types'] = $types;
        $data['typesubs'] = $typesubs;
        return view('boq.partials.form', $data);
    }


public function renderFormChange(BoqRepository $boq, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        //$country_list = DB::table('part');
        // $parts=Part::all();
        $cate = $boq->getById($id);
        // $groups=Group::all();
        // $types=Categorysub::all();
        // $categorys=Category::all();
        // $typesubs=Typesub::all();

        //$data['title'] = !empty($cate) ? $cate['list'] : 'เพิ่มข้อมูลราคา';
        $data['data'] = !empty($cate) ? $cate : $boq->castData2();
        // $data['parts'] = $parts;
        // $data['groups'] = $groups;
        // $data['categorys'] = $categorys;
        // $data['types'] = $types;
        // $data['typesubs'] = $typesubs;
        return view('boq.partials.change', $data);
    }


    public function store(BoqRepository $boq, Request $request)
    {
        $result = $boq->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);
    }

    public function storeChange(BoqRepository $boq, Request $request)
    {
        $result = $boq->storeChange($request);
        $data = DB::select('SELECT * FROM boqchange ORDER BY id DESC LIMIT 1');
        
        foreach ($data as $datas) {}
        $boq= DB::table('boq')->get();
        foreach ($boq as $boqs) {
            if(($datas->type)=="add"){
            $mcost1=$boqs->mcost*((100+$datas->mcost)/100);
            $wcost1=$boqs->wcost*((100+$datas->wcost)/100);
            $mcostt1= $mcost1-$boqs->mcost;
            $wcostt1=$wcost1-$boqs->wcost;
            $mcost= number_format($mcost1);
            $wcost= number_format($wcost1);
            $mcostt= number_format($mcostt1);
            $wcostt= number_format($wcostt1);
            $boqchangelist=DB::table('boqchangelist')->insert(
    ['mcost' => $mcost, 'wcost' => $wcost,'mcostc'=> $boqs->mcost,'wcostc'=>$boqs->wcost,'mcostt'=>$mcostt,'wcostt'=>$wcostt,'boq_id'=>$boqs->id,'boqchange_id'=>$datas->id]
);  
          
            $boqu=DB::table('boq')->where('id',$boqs->id)
        ->update(['mcost'=>$mcost,'wcost'=>$wcost]);
       
        }
        else{
            $mcost1=$boqs->mcost*((100-$datas->mcost)/100);
            $wcost1=$boqs->wcost*((100-$datas->wcost)/100);
            $mcostt1= $mcost1-$boqs->mcost;
            $wcostt1=$wcost1-$boqs->wcost;
            $mcost= number_format($mcost1);
            $wcost= number_format($wcost1);
            $mcostt= number_format($mcostt1);
            $wcostt= number_format($wcostt1);
             $boqchangelist=DB::table('boqchangelist')->insert(
    ['mcost' => $mcost, 'wcost' => $wcost,'mcostc'=> $boqs->mcost,'wcostc'=>$boqs->wcost,'mcostt'=>$mcostt,'wcostt'=>$wcostt,'boq_id'=>$boqs->id,'boqchange_id'=>$datas->id]
);  
            $boqu=DB::table('boq')->where('id',$boqs->id)
        ->update(['mcost'=>$mcost,'wcost'=>$wcost]);
        
     
        }
        
        }
      
        return redirect()->action('BoqController@index');
        // return response()->json([
        //     'message' => 'บันทึกข้อมูลสำเร็จ',
        //     'status' => 'success',
        // ], 200);
    }

    public function update(BoqRepository $boq, Request $request, $id)
    {
        $result = $boq->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function delete(BoqRepository $boq, $id)
    {
        $result = $boq->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }
}