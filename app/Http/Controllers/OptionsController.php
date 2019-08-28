<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\OptionsRepository;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class OptionsController extends Controller
{    
    public function index()
    {             
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
       
       // $options=DB::select("SELECT * FROM work where id ='".$id."'");
        return view('options.index');
    }
    
    public function getDatatables(OptionsRepository $options)
    {
        $data = $options->getDatatables();
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

    public function renderForm(OptionsRepository $options, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $work=DB::table('work')->get();
        $option = DB::table('options')->where('options_id','=',$id)->get();
        // $data['title'] = !empty($cate) ? $cate['oname'] : 'เพิ่มข้อมูลบริการ';
        // $data['data'] = !empty($cate) ? $cate : $options->castData();
        $data = $work;
        if($id!=0){return view('options.form2')->with(['data' => $data])->with(['option'=>$option]);}
        else{return view('options.form')->with(['data' => $data]);}
        
        
    }
     public function renderFormtype(OptionsRepository $options, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }

         $option = DB::table('options')->where('options_id','=',$id)->get();
      
        return view('options.type')->with(['option'=>$option]);
        
        
    }

     public function data(OptionsRepository $options, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $optiontype = DB::table('optionstype')->where('options_id','=',$id)
         ->orderBy('optionstype_id','asc')
        ->get();
        $optionlist = DB::table('optionslist') 
        ->join('boq', 'optionslist.boq_id', '=', 'boq.id')
        ->join('typesub', 'boq.typesub_id', '=', 'typesub.id')
        ->join('type', 'typesub.type_id', '=', 'type.id')
        ->join('category', 'type.category_id', '=', 'category.id')
        ->where('optionslist.options_id','=',$id)
        ->orderBy('optionslist.optionstype_id','asc')
        ->orderBy('category.categorynumber','asc')
        ->orderBy('type.typenumber','asc')
       
        ->get();
        // $category = DB::select("select optionslist.optionstype_id,boq.category_id,count(*) as numrows from optionslist 
        // join boq on optionslist.boq_id = boq.id 
        // join typesub on boq.typesub_id = typesub.id 
        // join type on typesub.type_id = type.id 
        // join category on type.category_id = category.id where optionslist.options_id = $id  
        // group by optionslist.optionstype_id order by optionslist.optionstype_id,category.categorynumber,type.typenumber asc");
        
        // $type = DB::select("select optionslist.optionstype_id,boq.category_id,category.categorynumber,category.categoryname,count(*) as numrows from optionslist 
        // join boq on optionslist.boq_id = boq.id 
        // join typesub on boq.typesub_id = typesub.id 
        // join type on typesub.type_id = type.id 
        // join category on type.category_id = category.id where optionslist.options_id = $id  
        // group by optionslist.optionstype_id,boq.category_id order by optionslist.optionstype_id,category.categorynumber,type.typenumber asc");
        // $typesub = DB::select("select optionslist.optionstype_id,boq.category_id,boq.type_id,type.typenumber,type.typename,count(*) as numrows from optionslist 
        // join boq on optionslist.boq_id = boq.id 
        // join typesub on boq.typesub_id = typesub.id 
        // join type on typesub.type_id = type.id 
        // join category on type.category_id = category.id where optionslist.options_id = $id  
        // group by optionslist.optionstype_id,boq.category_id,boq.type_id order by optionslist.optionstype_id,category.categorynumber,type.typenumber asc");
        // $boq = DB::select("select optionslist.optionstype_id,boq.category_id,boq.type_id,type.typenumber,type.typename,boq.typesub_id,typesub.typesubnumber,typesub.typesubname,count(*) as numrows from optionslist 
        // join boq on optionslist.boq_id = boq.id 
        // join typesub on boq.typesub_id = typesub.id 
        // join type on typesub.type_id = type.id 
        // join category on type.category_id = category.id where optionslist.options_id = $id  
        // group by optionslist.optionstype_id,boq.category_id,boq.type_id,boq.typesub_id order by optionslist.optionstype_id,category.categorynumber,type.typenumber asc");
        // $category = DB::table('category')->get();
        // $type = DB::table('type')->get();
        // $typesub = DB::table('typesub')->get();
        $category = DB::select("select optionslist.optionstype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname from optionslist 
        join boq on optionslist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id where optionslist.options_id = $id  
        group by optionslist.optionstype_id,boq.category_id order by optionslist.optionstype_id,category.categorynumber,type.typenumber asc");
        $type = DB::select("select optionslist.optionstype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname,boq.type_id,type.typenumber,type.typename from optionslist 
        join boq on optionslist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id where optionslist.options_id = $id  
        group by optionslist.optionstype_id,boq.category_id,boq.type_id order by optionslist.optionstype_id,category.categorynumber,type.typenumber asc");
         $typesub = DB::select("select optionslist.optionstype_id,boq.category_id,boq.category_id,category.categorynumber,category.categoryname,boq.type_id,type.typenumber,type.typename,boq.typesub_id,typesub.typesubnumber,typesub.typesubname from optionslist 
        join boq on optionslist.boq_id = boq.id 
        join typesub on boq.typesub_id = typesub.id 
        join type on typesub.type_id = type.id 
        join category on type.category_id = category.id where optionslist.options_id = $id  
        group by optionslist.optionstype_id,boq.category_id,boq.type_id,boq.typesub_id  order by optionslist.optionstype_id,category.categorynumber,type.typenumber asc");
        $option = DB::table('options')
         ->join('work', 'work.id', '=', 'options.work_id')
         ->where('options.options_id','=',$id)->get();
        // $data['title'] = !empty($cate) ? $cate['oname'] : 'เพิ่มข้อมูลบริการ';
        // $data['data'] = !empty($cate) ? $cate : $options->castData();
        //  print_r("<pre>");
        //   print_r($typesub);
       
        return view('options.data')->with(['option'=>$option])->with(['optionlist'=>$optionlist])->with(['optiontype'=>$optiontype])
         ->with(['category'=>$category])->with(['type'=>$type])
         ->with(['typesub'=>$typesub])
        //  ->with(['boq'=>$boq])
        ;
       
        
        
    }
     public function listboq(OptionsRepository $options, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $optiontype = DB::table('optionstype')->where('options_id','=',$id)
         ->orderBy('optionstype_id','asc')
        ->get();
       
        $option = DB::table('options')
         ->join('work', 'work.id', '=', 'options.work_id')
         ->where('options.options_id','=',$id)->get();
        // $data['title'] = !empty($cate) ? $cate['oname'] : 'เพิ่มข้อมูลบริการ';
        // $data['data'] = !empty($cate) ? $cate : $options->castData();
       
        return view('options.optionslistboq')->with(['option'=>$option])->with(['optiontype'=>$optiontype]);
       
        
        
    }

    public function store(OptionsRepository $options, Request $request)
    {
        $result = $options->store($request);
        
        return redirect()->action('OptionsController@index');
     
    }

    public function storetype(OptionsRepository $options, Request $request,$id)
    {
        $result = $options->storetype($request);
     
       return redirect('options/data/'.$id.'');
       
    }
    public function storelistboq(OptionsRepository $options, Request $request,$id)
    {
        $result = $options->storelistboq($request);
     
       return redirect('options/data/'.$id.'');
     
    }

    public function update(OptionsRepository $options, Request $request, $id)
    {
       
      
       
        $result = $options->update($request, $id);
        return redirect()->action('OptionsController@index');
        // $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        // $status = $result ? 'success' : 'error';
        // return response()->json([
        //     'message' => $message,
        //     'status' => $status,
        // ], 200);
    }

    public function delete(OptionsRepository $options, $id)
    {
        $result = $options->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }
    public function deltype(OptionsRepository $options, $id)
    {
        $option = DB::table('optionstype')
        ->select('options_id')
        ->where('optionstype_id','=',$id)
        ->first();
        $optionstype = DB::table('optionstype')->where('optionstype_id','=',$id);
        $optionstype->delete();
        $optionslist = DB::table('optionslist')->where('optionstype_id','=',$id);
        $optionslist->delete();
         return redirect('options/data/'.$option->options_id.'');
       
    }
    public function dellist(OptionsRepository $options, $id)
    {
        $option = DB::table('optionslist')
        ->select('options_id')
        ->where('optionslist_id','=',$id)
        ->first();
        $optionslist = DB::table('optionslist')->where('optionslist_id','=',$id);
        $optionslist->delete();
         return redirect('options/data/'.$option->options_id.'');
       
    }
}
