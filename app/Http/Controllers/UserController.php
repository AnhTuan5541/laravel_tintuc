<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function getDanhSach(){
        $user = User::paginate(10);
        return view('admin.user.danhsach',['user'=>$user]);
    }
    public function xoa($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao', 'Xóa user thành công');
    }
}
