<?php

namespace App\Http\Controllers;

use App\Repositories\TypesubRepository;
use Illuminate\Http\Request;
use App\Models\Categorysub;
use App\Models\Typesub;
use App\Models\Part;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use DB;

class TypesubController extends Controller
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
      
    //       $query=DB::table('part')
    //       ->join('category', 'category.part_id', '=', 'part.id') 
    //       ->join('group', 'group.id', '=', 'category.group_id')
    //       ->join('type', 'type.category_id', '=', 'category.id')
    //       ->join('typesub', 'typesub.type_id', '=', 'type.id') 
    //   ->orderBy('category.categorynumber','asc')
    // ->get();
    //      echo"<pre>";
    //    print_r($query);
     return view('typesub.index');
    }
    
    public function getDatatables(TypesubRepository $typesub)
    {
        $data = $typesub->getDatatables();
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

    public function renderForm(TypesubRepository $typesub, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        //$country_list = DB::table('part');
        $parts=Part::all();
        $cate = $typesub->getById($id);
        $groups=Group::all();
        $types=Categorysub::all();
        $categorys=Category::all();

        $data['title'] = !empty($cate) ? $cate['typesubname'] : 'เพิ่มข้อมูลหมวดย่อย';
        $data['data'] = !empty($cate) ? $cate : $typesub->castData();
        $data['parts'] = $parts;
        $data['groups'] = $groups;
        $data['categorys'] = $categorys;
        $data['types'] = $types;
        return view('typesub.partials.form', $data);
    }

    public function store(TypesubRepository $typesub, Request $request)
    {
         if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $result = $typesub->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);
    }

    public function update(TypesubRepository $typesub, Request $request, $id)
    {
         if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $result = $typesub->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function delete(TypesubRepository $typesub, $id)
    {
         if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $result = $typesub->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }
}
