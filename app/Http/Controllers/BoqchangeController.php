<?php

namespace App\Http\Controllers;

use App\Repositories\BoqchangeRepository;
use Illuminate\Http\Request;
use App\Models\Categorysub;
use App\Models\Typesub;
use App\Models\Part;
use App\Models\Partsub;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use DB;

class BoqchangeController extends Controller
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
    //return view('boq.index');
    }
    
    public function getDatatables(BoqchangeRepository $boq)
    {
        $data = $boq->getDatatables();
        $datatables = app('datatables');
        //  echo"<pre>";
       // print_r($data);
        return $datatables::of($data)
            ->blacklist(['id'])
            ->make(true);
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

    public function renderForm(BoqchangeRepository $boq, $id)
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

        $data['title'] = !empty($cate) ? $cate['list'] : 'เพิ่มข้อมูลราคา';
        $data['data'] = !empty($cate) ? $cate : $boq->castData();
        // $data['parts'] = $parts;
        // $data['groups'] = $groups;
        // $data['categorys'] = $categorys;
        // $data['types'] = $types;
        // $data['typesubs'] = $typesubs;
        return view('boqchange.change', $data);
    }





    public function store(BoqchangeRepository $boq, Request $request)
    {
        $result = $boq->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);
    }

   

    public function update(BoqchangeRepository $boq, Request $request, $id)
    {
        $result = $boq->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function delete(BoqchangeRepository $boq, $id)
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