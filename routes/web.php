<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'=>'dangnhap'], function(){
    Route::get('admin', 'AdminController@getDangNhapAdmin');
    Route::post('admin','AdminController@postDangNhapAdmin');
});


Route::group(['prefix'=>'admin'], function(){
    Route::group(['prefix'=>'theloai'], function(){
        Route::get('danhsach','TheLoaiController@getDanhSach');
        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');
        Route::get('sua/{id}','TheLoaiController@getSua');
        Route::post('sua/{id}','TheLoaiController@postSua');
        Route::get('xoa/{id}','TheLoaiController@xoa');
    });

    Route::group(['prefix'=>'loaitin'], function(){
        Route::get('danhsach','LoaiTinController@getDanhSach');
        Route::get('them','LoaiTinController@getThem');
        Route::post('them','LoaiTinController@postThem');
        Route::get('sua/{id}','LoaiTinController@getSua');
        Route::post('sua/{id}','LoaiTinController@postSua');
        Route::get('xoa/{id}','LoaiTinController@xoa');
    });

    Route::group(['prefix'=>'tintuc'], function(){
        Route::get('danhsach','TinTucController@getDanhSach');
        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');
        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');
        Route::get('xoa/{id}','TinTucController@xoa');
    });

    Route::group(['prefix'=>'slide'], function(){
        Route::get('danhsach','SlideController@getDanhSach');
        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');
        Route::get('sua/{id}','SlideController@getSua');
        Route::post('sua/{id}','SlideController@postSua');
        Route::get('xoa/{id}','SlideController@xoa');
    });

    Route::group(['prefix'=>'user'], function(){
        Route::get('danhsach','UserController@getDanhSach');
        Route::get('xoa/{id}','UserController@xoa');
    });

    Route::group(['prefix'=>'admin_acc'], function(){
        Route::get('danhsach','AdminController@getDanhSach');
        Route::get('them','AdminController@getThem');
        Route::post('them','AdminController@postThem');
        Route::get('sua/{id}','AdminController@getSua');
        Route::post('sua/{id}','AdminController@postSua');
        Route::get('xoa/{id}','AdminController@xoa');
    });

    Route::group(['prefix'=>'ajax'], function(){
        Route::get('/loaitin/{idTheLoai}','AjaxController@getLoaiTin');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
