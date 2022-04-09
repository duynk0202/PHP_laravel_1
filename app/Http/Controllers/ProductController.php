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

class ProductController extends Controller
{
    public function cart()
    {
        return view('cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($masp)
    {
        $sanpham = DB::table('sanphams')->where('MaSP','=',$masp)->first();
        $cart = session()->get('cart', []);
  
        if(isset($cart[$masp])) {
            $cart[$masp]['quantity']++;
        } else {
            $cart[$masp] = [
               "masp"=> $sanpham->MaSP,
                "tensp" => $sanpham->TenSP,
                "quantity" => 1,
                "gia" => $sanpham->gia,
                "image" => $sanpham->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    
    public function remove(Request $request)
    {
        $masp=$request->input('masp');
        if($masp) {
            $cart = session()->get('cart');
            if(isset($cart[$masp])) {
                unset($cart[$masp]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Sản phẩm đã được xóa');
        }
        return view('cart');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->mahh && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->mahh]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Giỏ hàng update thành công');
        }
    }
    public function thanhtoan($total){
        
        if(session('cart')!==null){
            $ngaydat=date('Y/m/d');
            $makh=Auth::id();
            DB::insert('insert into hoadon(makh,ngaydat,tongtien) values(?,?,?)',[$makh,$ngaydat,$total]);
            session()->forget('cart');
            return redirect('/home')->with('success', 'Thanh toán thành công!');
        }
    }
    public function getSearch(Request $req){
        $sanpham=DB::table('sanphams')->orderBy('gia','asc')->where('tensp','like','%'.$req->key.'%')->orWhere('gia',$req->key)->get();
        return view('search',['sanpham'=>$sanpham]);
    }
  
}

