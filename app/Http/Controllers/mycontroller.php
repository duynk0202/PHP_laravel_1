<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\News;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use App\Models\Flight;
use App\Models\sanpham;
use Illuminate\Pagination;
class mycontroller extends Controller
{
    public function LuuHang(Request $request){
        //dd($request->all());
        $message=[];
        $validator = Validator::make($request->all(),
        ['masp'=>'required | size: 4 | unique:sanphams,"MaSP"',
        'tensp'=>'required | max:100 | unique:sanphams,"TenSP"',
        'gia'=>'required | numeric',
        'hinhsanpham'=>'required|mimes:jpg,jpeg,png,gif|max:1024',
        ]
        ,$message);
        if($validator->fails())
        return redirect('products')->withErrors($validator)->withInput();
        else{
            $masp= $request->input('masp');
            $tensp= $request->input('tensp');
            $mota = $request->input('mota');
            $maloai = $request->input('maloai');
            $gia = $request->input('gia');
            $hinh = $request->file('hinhsanpham');
            $storePath = $hinh->move('Public/Images',$hinh->getClientOriginalName());
            DB::insert(' insert into sanphams (MaSP,TenSP,Mota,gia,Maloai,image) values 
            (?,?,?,?,?,?)',[$masp,$tensp,$mota,$gia,$maloai,$storePath]);
           return redirect('products');
        }
    }
    public function XemSanPham(){
        $sanpham=sanpham::all()->paginate(6);
        return view('admin/sanpham',['sanpham'=>$sanpham]);
    }   
    public function XemSanPhamUser(){
        
        $sanpham =DB::table('sanphams')->select('*')->paginate(6);
        return view('sanpham',compact('sanpham'));
    } 
    public function XemSanPhamCN(){
        $sanpham=DB::table('sanphams')->select('*')->get();
        return view('admin/capnhat',['sanpham'=>$sanpham]);
    } 
    public function XemSanPhamCT(){
        $sanpham=DB::table('sanphams')->select('*')->get();
        return view('chitietsanpham',['sanpham'=>$sanpham]);
    } 
    public function LuuTheLoai(Request $request){
        $message=[];
        $validator = Validator::make($request->all(),
        ['maloai'=>'required | max:20 | unique:theloai,"MaLoai"',
        'tenloai'=>'required | max:100 | unique:theloai,"TenTheLoai"',
        ]
        ,$message);
        if($validator->fails())
        return redirect('theloai')->withErrors($validator)->withInput();
        else{
            $maloai= $request->input('maloai');
            $tentheloai= $request->input('tenloai');
            
            DB::insert(' insert into theloai (MaLoai,TenTheLoai) values 
            (?,?)',[$maloai,$tentheloai]);
            return redirect('theloai');
        }       
    }
    public function edit($masp)
    {
        $news = sanpham::find($masp);
        $masp = $masp;
        return view('/admin/giaodiencapnhat', compact('news','masp'));
    }
    public function chitietsanpham($masp)
    {
        $sanpham = sanpham::find($masp);
        $masp = $masp;
        return view('/chitietsanpham', compact('sanpham','masp'));
    }
    public function update(Request $request, $MaSP)
    {
        $news = sanpham::find($MaSP);
       
        $news->Mota = $request->input('mota');
        $news->gia= $request->input('gia');
        $news->MaLoai = $request->input('maloai');
        $hinh = $request->file('image');
        $news->image = $storePath = $hinh->move('Public/Images',$hinh->getClientOriginalName());// $request>file('image')->store('Public/Image');
        $news->save();
        return redirect('/capnhat');
    }           
    public function delete($masp)
    {
        $news = sanpham::find($masp);
        $news->delete();
        return redirect('/capnhat');
    }
    public function chitiet($masp){
        $news = sanpham::find($masp);
        $masp = $masp;
        $sanpham= DB::select ('select * from sanphams where MaSP=?',[$masp]);
        return view('chitietsanpham',['sanpham'=>$sanpham]);
    }
    public function XemPhimHD(){
        $sanpham =DB::select("select a.masp,a.image,a.tensp,a.mota,a.tensp,a.gia from theloai b,sanphams a WHERE a.maloai = b.maloai  and a.maloai = 'FIHD'");
        return view('phimhanhdong',['sanpham'=>$sanpham]);
    } 
    public function XemPhimTC(){
        $sanpham =DB::select("select a.masp,a.image,a.tensp,a.mota,a.tensp,a.gia from theloai b,sanphams a WHERE a.maloai = b.maloai  and a.maloai = 'FITC'");
        return view('phimhanhdong',['sanpham'=>$sanpham]);
    } 
    public function XemPhimMa(){
        $sanpham =DB::select("select a.masp,a.image,a.tensp,a.mota,a.tensp,a.gia from theloai b,sanphams a WHERE a.maloai = b.maloai  and a.maloai = 'Ma'");
        return view('phimhanhdong',['sanpham'=>$sanpham]);
    } 
    
}
