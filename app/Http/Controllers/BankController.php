<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\BankRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class BankController extends Controller
{    
    public function index()
    {             
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }

        return view('bank.index');
    }
    public function view(BankRepository $bank, $id)
    {        
        $cate = $bank->getById($id);
        $data['title'] = $cate['name'];
        $data['data'] =  $cate;        
        return view('bank.partials.view', $data);
    }
    public function getDatatables(BankRepository $bank)
    {
        $data = $bank->getDatatables();
        $datatables = app('datatables');
        return $datatables->eloquent($data)
            ->blacklist(['id'])
            ->make(true);
    }

    public function renderForm(BankRepository $bank, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        
        $cate = $bank->getById($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'เพิ่มข้อมูลธนาคาร';
        $data['data'] = !empty($cate) ? $cate : $bank->castData();
        return view('bank.partials.form', $data);
    }

    public function store(BankRepository $bank, Request $request)
    {
        $result = $bank->store($request);
        return response()->json([
            'message' => 'บันทึกข้อมูลสำเร็จ',
            'status' => 'success',
        ], 200);
    }

    public function update(BankRepository $bank, Request $request, $id)
    {
        $result = $bank->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

    public function delete(BankRepository $bank, $id)
    {
        $result = $bank->delete($id);
        
        $message = $result ? 'ลบข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }

   public function uploadfile(Request $request)
    {
        $validator = Validator::make($request->all(), ['file' => 'required|mimes:jpeg,png,jpg|max:2048'],
        [
            'file.mimes' => 'ไฟล์เอกสารต้องเป็น รูป เท่านั้น',
            'file.required' => 'ระบุไฟล์เพื่ออัพโหลด',
            'file.max' => 'ขนาดไฟล์ใหญ่เกินไป ห้ามเกิน 2 MB.'
        ]);
        $status = 'success';
        $message = 'อัพโหลดเสร็จสมบูรณ์';
        $data = null;
        if ($validator->fails()) {
            $status = 'error';
            $message = $validator->errors();
        } else {
            $data = $request->file('file')->store('documents');
        }

        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ], 200);
    }
    
}
