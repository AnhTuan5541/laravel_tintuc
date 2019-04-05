<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
use App\theloai;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
        $loaitin = loaitin::paginate(10);
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem(){
        $theloai = theloai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|unique:loaitin,Ten|min:3|max:100'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên loại tin',
            'Ten.unique'=>'Tên loại tin đã tồn tại',
            'Ten.min'=>'Tên loại tin phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên loại tin phải từ 3 đến 100 kí tự'
        ]);

        $loaitin = new loaitin;
        $loaitin->Ten = $request->Ten;
        $loaitin->idTheLoai = $request->idTheLoai;
        $loaitin->TenKhongDau= str_slug($request->Ten,'-');
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao','Bạn đã thêm loại tin thành công');
    }

    public function getSua($id){
        $loaitin = loaitin::find($id);
        $theloai = theloai::all()->where('id','!=',$loaitin->idTheLoai);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin, 'theloai'=>$theloai]);
    }

    public function postSua(Request $request, $id){
        $loaitin = loaitin::find($id);
        $loaitin->Ten ='';
        $loaitin->save();
        $this->validate($request,
        [
            'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên loại tin',
            'Ten.unique'=>'Tên loại tin đã tồn tại',
            'Ten.min'=>'Tên loại tin phải từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên loại tin phải từ 3 đến 100 kí tự'
        ]);

        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau= str_slug($request->Ten,'-');
        $loaitin->idTheLoai = $request->idTheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Bạn đã sửa loại tin thành công');
    }

    public function xoa($id){
        $loaitin = loaitin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao',"Xóa loại tin thành công");
    }
}
