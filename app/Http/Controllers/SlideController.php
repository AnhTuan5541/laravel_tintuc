<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;

class SlideController extends Controller
{
    public function getDanhSach(){
        $slide = slide::orderBy('id','DESC')->paginate(5);
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem(){
        return view('admin.slide.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:slide,Ten',
            'file'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên slide',
            'Ten.min'=>'Tên slide có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên slide có độ dài từ 3 đến 100 kí tự',
            'Ten.unique'=>'Tên slide đã tồn tại',
            'file.required'=>'Bạn chưa tải ảnh'
        ]);

        $slide = new slide;
        $slide->Ten = $request->Ten;

        $image = $request->file('file');
        $duoiImage = $image->getClientOriginalExtension();
        if($duoiImage != 'jpg' && $duoiImage != 'png' && $duoiImage !='jpeg' && $duoiImage !='JPG' && $duoiImage !='PNG'){
            return redirect('admin/slide/them')->with('loi','Chỉ có thể up file .jpg .png .jpeg .JPG .PNG');
        }
        $tenHinhGoc = $image->getClientOriginalName();
        $tenHinhMoi = str_random(4).'-'.$tenHinhGoc;
        while(file_exists('upload/slide/'.$tenHinhMoi)){
            $tenHinhMoi = str_random(4).'-'.$tenHinhGoc;
        }
        $image->move('upload/slide',$tenHinhMoi);
        $slide->TenHinh = $tenHinhMoi;

        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm slide thành công');
    }

    public function getSua($id){
        $slide = slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request, $id){
        $slide = slide::find($id);
        $slide->Ten ='';
        $slide->save();
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:slide,Ten',
            'file'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên slide',
            'Ten.min'=>'Tên slide có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên slide có độ dài từ 3 đến 100 kí tự',
            'Ten.unique'=>'Tên slide đã tồn tại',
            'file.required'=>'Bạn chưa tải ảnh'
        ]);

        $slide->Ten = $request->Ten;

        $image = $request->file('file');
        $duoiImage = $image->getClientOriginalExtension();
        if($duoiImage != 'jpg' && $duoiImage != 'png' && $duoiImage !='jpeg' && $duoiImage !='JPG' && $duoiImage !='PNG'){
            return redirect('admin/slide/sua/'.$id)->with('loi','Chỉ có thể up file .jpg .png .jpeg .JPG .PNG');
        }
        $tenHinhGoc = $image->getClientOriginalName();
        $tenHinhMoi = str_random(4).'-'.$tenHinhGoc;
        while(file_exists('upload/slide/'.$tenHinhMoi)){
            $tenHinhMoi = str_random(4).'-'.$tenHinhGoc;
        }
        $image->move('upload/slide',$tenHinhMoi);
        $slide->TenHinh = $tenHinhMoi;

        $slide->save();
        return redirect('admin/slide/danhsach')->with('thongbao','Sửa slide thành công');
    }

    public function xoa($id){
        $slide = slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa slide thành công');
    }
}
