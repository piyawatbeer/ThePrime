<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\WorkRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{    
    public function index()
    {             
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        
        return view('work.index');
    }
    
    public function getDatatables(WorkRepository $work)
    {
        $data = $work->getDatatables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function renderForm(WorkRepository $work, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        
        $cate = $work->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'เพิ่มข้อมูลบริการ';
        $data['data'] = !empty($cate) ? $cate : $work->castData();
        return view('work.partials.form', $data);
    }

    public function store(WorkRepository $work, Request $request)
    {
         if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $result = $work->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);
    }

    public function update(WorkRepository $work, Request $request, $id)
    {
         if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $result = $work->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function delete(WorkRepository $work, $id)
    {
         if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $result = $work->delete($id);
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }
}
