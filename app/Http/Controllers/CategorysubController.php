<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CategorysubRepository;
use Illuminate\Http\Request;
 use App\Models\Categorysub;
use App\Models\Part;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use DB;
class CategorysubController extends Controller
{    
    public function index()
    {             
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
    //   $query=DB::table('part')
    // ->join('category', 'category.part_id', '=','part.id')
    //  ->join('group', 'group.id', '=', 'category.group_id')
    // ->join('type', 'type.category_id', '=', 'category.id')
    // ->where('type.id',@$id)
    // ->orderBy('part.id')
    // ->get();
    // echo"<pre>";
    //     print_r($query);
        return view('categorysub.index');
    }
      public function print(CategorysubRepository $category)
    { 
        return view('categorysub.print');
    }
    public function getDatatables(CategorysubRepository $category)
    {
        $data = $category->getDatatables();
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

    public function renderForm(CategorysubRepository $category, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        //$country_list = DB::table('part');
        $parts=Part::all();
        $cate = $category->getById($id);
        $groups=Group::all();
        $categorys=Category::all();

        $data['title'] = !empty($cate) ? $cate['typename'] : 'เพิ่มข้อมูลหมวดย่อย';
        $data['data'] = !empty($cate) ? $cate : $category->castData();
        $data['parts'] = $parts;
        $data['groups'] = $groups;
        $data['categorys'] = $categorys;
        return view('categorysub.partials.form', $data);
    }

    public function store(CategorysubRepository $category, Request $request)
    {
        $result = $category->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);
    }

    public function update(CategorysubRepository $category, Request $request, $id)
    {
        $result = $category->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function delete(CategorysubRepository $category, $id)
    {
        $result = $category->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }
}
