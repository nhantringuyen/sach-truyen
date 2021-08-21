<?php
//php artisan make:controller TruyenController --resource
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admincp.truyen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view('admincp.truyen.create')->with(compact('danhmuc'));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'slug_truyen' => 'required|unique:truyen|max:255',

                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',

                'tomtat' => 'required',
                'truyennoibat' => 'required',
//                'tukhoa' => 'required',
//                'tacgia' => 'required',
                'kichhoat' => 'required',
//                'hoanthien' => 'required',
//                'views' => 'required',
                'danhmuc' => 'required',
//                'theloai' => 'required',
            ],
            [
//                'views.required' => 'Yêu cầu nhập lượt xem',
                'slug_truyen.unique' => 'Tên truyện đã có ,xin điền tên khác',
                'tentruyen.unique' => 'Slug truyện đã có ,xin điền slug khác',
                'tentruyen.required' => 'Tên truyện phải có nhé',
//                'tukhoa.required' => 'Từ khóa truyện phải có nhé',
                'tomtat.required' => 'Mô tả truyện phải có nhé',
//                'tacgia.required' => 'Tác giả truyện phải có nhé',
                'slug_truyen.required' => 'Slug truyện phải có',
                'hinhanh.required' => 'Hình ảnh truyện phải có',

            ]
        );
        // $data = $request->all();
        // // dd($data);
        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
//        $truyen->tukhoa = $data['tukhoa'];
        $truyen->slug_truyen = $data['slug_truyen'];
//        $truyen->hoanthien = $data['hoanthien'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
//        $truyen->tacgia = $data['tacgia'];
//        $truyen->views = $data['views'];
//        $truyen->truyen_noibat = $data['truyennoibat'];

//        foreach($data['danhmuc'] as $key => $danh){
//            $truyen->danhmuc_id = $danh[0];
//        }
//        $truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');

//        foreach($data['danhmuc'] as $key => $danh){
//            $truyen->danhmuc_id = $danh[0];
//        }
//
//        foreach($data['theloai'] as $key => $the){
//            $truyen->theloai_id = $the[0];
//        }
        //them anh vao folder hinh188.jpg
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $truyen->hinhanh = $new_image;
        $truyen->save();

//        $truyen->thuocnhieudanhmuctruyen()->attach($data['danhmuc']);
//        $truyen->thuocnhieutheloaitruyen()->attach($data['theloai']);



        return redirect()->back()->with('status','Thêm truyện thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
