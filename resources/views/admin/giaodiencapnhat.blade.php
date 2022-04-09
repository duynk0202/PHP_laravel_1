@extends('admin.home')
@section('giaodiencapnhat')
<div class="container justify-content-center  border bg-white">

    <form method="post" action="{{ URL::to('/admin/giaodiencapnhat/update/'.$masp)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="masp" value="{{$news->$masp}}">
        <p>
            <h5 for="tensp">Tên Sản Phẩm</h5><br>
            <input disabled class="form-control" type="text" name="tensp" value="{{ $news->TenSP}}">
        </p>
    
        <p>
            <h5 for="mota">Mô tả</h5><br>
            <textarea cols="50" rows="5" name="mota">{{ $news->Mota }}</textarea>
        </p>
        <p>
            <h5 for="gia">Giá</h5><br>
            <input type="number" name="gia" value="{{$news->gia}}">
        </p>
        <p>
        <h5 for="maloai">Mã loại phim</h5><br>
            <input type="text" name="maloai" value="{{$news->MaLoai}}">
        </p>
        <p>
    
        <p>
            <h5 for="image" >Image</h5>
            <input type="file" name="image" value="{{$news->image}}" ><hr>
            <span style="color:red">Bắt buộc cập nhật hình ảnh mới</span>
        </p>
    
       
        <p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </p>
    </form>

</div>
@endsection