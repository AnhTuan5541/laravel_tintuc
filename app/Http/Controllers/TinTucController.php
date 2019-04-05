<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuc;
use App\loaitin;
use App\theloai;

class TinTucController extends Controller
{
    public function getDanhSach(){
        $tintuc = tintuc::orderBy('id','DESC')->paginate(5);
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem(){
        $theloai = theloai::all();
        $loaitin = loaitin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:tintuc,Ten',
            'idTheLoai'=>'required',
            'idLoaiTin'=>'required',
            'TomTat'=>'required|min:3',
            'NoiDung'=>'required|min:3',
            'file'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên tin tức',
            'Ten.unique'=>'Tên tin tức đã tồn tại',
            'Ten.min'=>'Tên tin tức có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên tin tức có độ dài từ 3 đến 100 kí tự',
            'idTheLoai.required'=>'Bạn chưa chọn thể loại',
            'idLoaiTin.required'=>'Bạn chưa chọn loại tin',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt tin',
            'TomTat.min'=>'Tóm tắt có độ dài ít nhất 3 kí tự',
            'NoiDung.required'=>'Bạn chưa nhập nội dung tin',
            'NoiDung.min'=>'Nội dung có độ dài ít nhất 3 kí tự',
            'file.required'=>'Bạn chưa có hình'
        ]);

        $tintuc = new tintuc;
        $tintuc->Ten = $request->Ten;
        $tintuc->TenKhongDau = str_slug($request->Ten,'-');
        $tintuc->idLoaiTin = $request->idLoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        //Up hình ảnh
        $image = $request->file('file'); //Lưu hình image vào biến $image
        $duoiImage = $image->getClientOriginalExtension();
        if($duoiImage != 'jpg' && $duoiImage != 'png' && $duoiImage !='jpeg' && $duoiImage !='JPG' && $duoiImage !='PNG'){
            return redirect('admin/tintuc/them')->with('loi','Chỉ có thể up file .jpg .png .jpeg .JPG .PNG');
        }
        $tenHinhGoc = $image->getClientOriginalName();//Láy tên hình gốc
        $tenHinhMoi = str_random(4).'-'.$tenHinhGoc;//đổi tên hình gốc
        while(file_exists('upload/tintuc/'.$tenHinhMoi)){//nếu tên hình đã tồn tại trong thư mục upload/tintuc
            $tenHinhMoi = str_random(4).'-'.$tenHinhGoc;//đổi tên hình
        }
        $image->move('upload/tintuc',$tenHinhMoi);//chuyển hình image với tên mới vào thư mục upload/tintuc
        $tintuc->TenHinh = $tenHinhMoi;
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm tin tức mới thành công');
    }

    public function getSua($id){
        $tintuc = tintuc::find($id);
        $loaitin = loaitin::all()->where('id','!=',$tintuc->idLoaiTin);
        $theloai = theloai::all()->where('id','!=',$tintuc->loaitin->idTheLoai);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
        $tintuc = tintuc::find($id);
        $tintuc->Ten = '';
        $tintuc->save();
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:tintuc,Ten',
            'idTheLoai'=>'required',
            'idLoaiTin'=>'required',
            'TomTat'=>'required|min:3',
            'NoiDung'=>'required|min:3',
            'file'=>'required|image|mines:jpg,png,jpeg,JPG,PNG,gif|max:2048'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên tin tức',
            'Ten.unique'=>'Tên tin tức đã tồn tại',
            'Ten.min'=>'Tên tin tức có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên tin tức có độ dài từ 3 đến 100 kí tự',
            'idTheLoai.required'=>'Bạn chưa chọn thể loại',
            'idLoaiTin.required'=>'Bạn chưa chọn loại tin',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt tin',
            'TomTat.min'=>'Tóm tắt có độ dài ít nhất 3 kí tự',
            'NoiDung.required'=>'Bạn chưa nhập nội dung tin',
            'NoiDung.min'=>'Nội dung có độ dài ít nhất 3 kí tự',
            'file.required'=>'Bạn chưa có hình',
            'file.image'=>'Không phải là hình',
            'file.mines'=>'Hình phải là loại file jpg,png,jpeg,gif',
            'file.max'=>'Kích thước ảnh phải dưới 2048Kb'
        ]);

        $tintuc->Ten = $request->Ten;
        $tintuc->TenKhongDau = str_slug($request->Ten,'-');
        $tintuc->idLoaiTin = $request->idLoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        //Up hình ảnh
        $image = $request->file('file'); //Lưu hình image vào biến $image
        $duoiImage = $image->getClientOriginalExtension();
        if($duoiImage != 'jpg' && $duoiImage != 'png' && $duoiImage !='jpeg' && $duoiImage !='JPG' && $duoiImage !='PNG'){
            return redirect('admin/tintuc/them')->with('loi','Chỉ có thể up file .jpg .png .jpeg .JPG .PNG');
        }
        $tenHinhGoc = $image->getClientOriginalName();//Láy tên hình gốc
        $tenHinhMoi = str_random(4).'-'.$tenHinhGoc;//đổi tên hình gốc
        while(file_exists('upload/tintuc/'.$tenHinhMoi)){//nếu tên hình đã tồn tại trong thư mục upload/tintuc
            $tenHinhMoi = str_random(4).'-'.$tenHinhGoc;//đổi tên hình
        }
        $image->move('upload/tintuc/',$tenHinhMoi);//chuyển hình image với tên mới vào thư mục upload/tintuc
        $tintuc->TenHinh = $tenHinhMoi;
        $tintuc->save();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Sửa tin tức thành công');
    }

    public function xoa($id){
        $tintuc = tintuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xóa tin tức thành công');
    }
}
