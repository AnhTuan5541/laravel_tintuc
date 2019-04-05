<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\admin;
class AdminController extends Controller
{
    //Lấy danh sách
    public function getDanhSach(){
        $admin = admin::paginate(10);
        return view('admin.admin_acc.danhsach',['admin'=>$admin]);
    }
    //Thêm admin
    public function getThem(){
        //Lấy view thêm
        return view('admin.admin_acc.them');
    }
    public function postThem(Request $request){
        //Xác thực, kiểm tra lỗi
        $this->validate($request,
        [
            'TaiKhoan'=>'required|email|unique:admin,TaiKhoan|min:6|max:32',
            'MatKhau'=>'required|min:6|max:32',
            'NhapLaiMatKhau'=>'required|same:MatKhau'
        ],
        [
            'TaiKhoan.required'=>'Bạn chưa nhập tài khoản',
            'TaiKhoan.email'=>'Tài khoản email không hợp lệ',
            'TaiKhoan.unique'=>'Tài khoản đã tồn tại',
            'TaiKhoan.min'=>'Tài khoản phải từ 6 đến 32 kí tự',
            'TaiKhoan.max'=>'Tài khoản phải từ 6 đến 32 kí tự',
            'MatKhau.required'=>'Bạn chưa nhập mật khẩu',
            'MatKhau.min'=>'Mật khẩu phải từ 6 đến 32 kí tự',
            'MatKhau.max'=>'Mật khẩu phải từ 6 đến 32 kí tự',
            'NhapLaiMatKhau.required'=>'Bạn chưa nhập lại mật khẩu',
            'NhapLaiMatKhau.same'=>'Nhập lại mật khẩu chưa đúng'
        ]);
        //Tạo tài khoản admin mới
        $admin = new admin;
        $admin->Ten = strstr($request->TaiKhoan,'@',true);
        $admin->MatKhau = bcrypt($request->MatKhau);
        $admin->MatKhauKoMaHoa = $request->MatKhau;

        $TaiKhoan = $request->TaiKhoan;
        if(substr($TaiKhoan,-10) != '@gmail.com'){
            return redirect('admin/admin_acc/them')->with('loi','Tài khoản phải là @gmail.com');
        }
        else{
            $admin->TaiKhoan = $TaiKhoan;
        }
        $admin->save();

        return redirect('admin/admin_acc/them')->with('thongbao','Thêm admin thành công');
    }
    //Sửa tài khoản admin
    public function getSua($id){
        //Tìm admin theo id và mở view
        $admin = admin::find($id);
        return view('admin.admin_acc.sua',['admin'=>$admin]);
    }
    //Sửa
    public function postSua(Request $request, $id){
        $admin = admin::find($id);//Tìm admin theo id
        //Khi checkbox on thì cho đổi mật khẩu
        // if($request->doiMatKhau =="on"){
        //     $this->validate($request,
        //     [
        //         'MatKhauCu'=>'required',
        //         'MatKhauMoi'=>'required|min:6|max:32',
        //         'NhapLaiMatKhau'=>'required|same:MatKhauMoi'
        //     ],
        //     [
        //         'MatKhauCu.required'=>'Bạn chưa nhập mật khẩu cũ',
        //         'MatKhauMoi.required'=>'Bạn chưa nhập mật khẩu mới',
        //         'MatKhauMoi.min'=>'Mật khẩu phải từ 6 đến 32 kí tự',
        //         'MatKhauMoi.max'=>'Mật khẩu phải từ 6 đến 32 kí tự',
        //         'NhapLaiMatKhau.required'=>'Bạn chưa nhập lại mật khẩu',
        //         'NhapLaiMatKhau.same'=>'Nhập lại mật khẩu chưa đúng'
        //     ]);
        //     if($admin->MatKhauKoMaHoa == $request->MatKhauCu){
        //         $admin->MatKhau = bcrypt($request->MatKhauMoi);
        //         $admin->MatKhauKoMaHoa = $request->MatKhauMoi;
        //     }
        //     else{
        //         return redirect('admin/admin_acc/sua/'.$id)->with('loi','Mật khẩu cũ không đúng');
        //     }
        // }
        $this->validate($request,
            [
                'MatKhauCu'=>'required',
                'MatKhauMoi'=>'required|min:6|max:32',
                'NhapLaiMatKhau'=>'required|same:MatKhauMoi'
            ],
            [
                'MatKhauCu.required'=>'Bạn chưa nhập mật khẩu cũ',
                'MatKhauMoi.required'=>'Bạn chưa nhập mật khẩu mới',
                'MatKhauMoi.min'=>'Mật khẩu phải từ 6 đến 32 kí tự',
                'MatKhauMoi.max'=>'Mật khẩu phải từ 6 đến 32 kí tự',
                'NhapLaiMatKhau.required'=>'Bạn chưa nhập lại mật khẩu',
                'NhapLaiMatKhau.same'=>'Nhập lại mật khẩu chưa đúng'
            ]);
            if($admin->MatKhauKoMaHoa == $request->MatKhauCu){
                $admin->MatKhau = bcrypt($request->MatKhauMoi);
                $admin->MatKhauKoMaHoa = $request->MatKhauMoi;
            }
            else{
                return redirect('admin/admin_acc/sua/'.$id)->with('loi','Mật khẩu cũ không đúng');
            }
        $admin->save();
        return redirect('admin/admin_acc/sua/'.$id)->with('thongbao','Đổi mật khẩu thành công');
    }
    public function xoa($id){
        $admin = admin::find($id);
        $admin->delete();
        return redirect('admin/admin_acc/danhsach')->with('thongbao',"Xóa admin thành công");
    }

    public function getDangNhapAdmin(){
        return view('admin.dangnhap');
    }

    public function postDangNhapAdmin(Request $request){
        if(Auth::attempt(['TaiKhoan'=>$request->TaiKhoan, 'MatKhau'=>$request->MatKhau])){
            return redirect('admin/theloai/danhsach');
        }
        else{
            return redirect('dangnhap/admin')->with('loi','Sai tài khoản hoặc mật khẩu');
        }
    }
}
