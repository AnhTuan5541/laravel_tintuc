<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
class TheLoaiController extends Controller
{
    public function getDanhSach(){
        $theloai = theloai::paginate(10);
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getThem(){
        return view('admin.theloai.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.unique'=>'Tên thể loại đã tồn tại',
            'Ten.min'=>'Tên thể loại phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên thể loại phải từ 3 đến 100 kí tự'
        ]);

        $theloai = new theloai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau= str_slug($request->Ten,'-');
        $theloai->save();

        return redirect('admin/theloai/them')->with('thongbao','Bạn đã thêm thể loại thành công');
    }

    public function getSua($id){
        $theloai = theloai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    public function postSua(Request $request, $id){
        $theloai = theloai::find($id);
        $theloai->Ten ='';
        $theloai->save();
        $this->validate($request,
        [
            'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.unique'=>'Tên thể loại đã tồn tại',
            'Ten.min'=>'Tên thể loại phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên thể loại phải từ 3 đến 100 kí tự'
        ]);


        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau= str_slug($request->Ten,'-');
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Bạn đã sửa tên thể loại thành công');
    }

    public function xoa($id){
        $theloai = theloai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao',"Xóa thể loại thành công");
    }
}
