<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT service_status, COUNT(*) as total FROM service GROUP BY service_status');
        return view('home')->with(['data' => $data]);
    }
     public function profile()
    {       $id=Auth::user()->id;
            $users=User::find($id);
         return view('user.profile')->with(['users' => $users]);
    }
      public function renderFormp($id)
    {
       
        
        $cate = User::find($id);
        $data['title'] = !empty($cate) ? $cate['name'] : 'เพิ่มข้อมูลสมาชิก';
        $data['data'] = !empty($cate) ? $cate : $user->castData();
        return view('user.partials.pform', $data);
    }
      public function usernameCheck(Request $request)
    {
        $result = User::where('username', $request->username)->first();
        $status = true;
        if(!empty($result)){
            $status = $result->id != $request->id ? false : true;
        }
        return response()->json($status, 200);
    }
     public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return false;
        }

        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->line = $request->line;
        $user->tel = $request->tel;
        $user->facebook = $request->facebook;
        $user->department = $request->department;
        $user->user_type = $request->user_type;
        $user->save();
        
        $message = $user ? 'บันทึกข้อมูลสำเร็จ' : 'เกิดข้อผิดพลาด!';
        $status = $user ? 'success' : 'error';
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 200);
    }
}
