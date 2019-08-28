<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CompanyController extends Controller
{
    //
     public function index(CompanyRepository $com)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        $companys=$com->getAll();
        return view('company.index')->with(['companys' => $companys]);
    }
    public function update(CompanyRepository $company, Request $request, $id){
        $result = $company->update($request, $id);
        $message = $result ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $result ? 'success' : 'error';
        return response()->json([
            'message' => $message,            
            'status' => $status
        ], 200);
        
    }
     public function renderForm(CompanyRepository $company, $id)
    {
        if(strtolower(Auth::user()->user_type) !== 'admin'){
            return redirect('/');
        }
        
        $cate = $company->getById($id);
        $data['title'] = 'แก้ไขข้อมูลบริษัท';
        $data['data'] = !empty($cate) ? $cate : $company->castData();
        return view('company.partials.form', $data);
    }
   

}
