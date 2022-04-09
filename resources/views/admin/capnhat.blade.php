@extends('admin.home')
@section('capnhat')
<div class="container text-white">
<table class="table ">
  <thead>
    <tr class="text-white">
      <th scope="col">Mã phim</th>
      <th scope="col">Tên phim</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá vé</th>
      <th scope="col">Thao tác</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody class="bg-white text-center" >
    <tr >
    @foreach($sanpham as $row)
     
      <td name="masp">{{$row->MaSP}}</td>
      <td name="tensp">{{$row->TenSP}}</td>
      <td name="tensp">{{$row->gia}}</td>
      <td> <img src="{{$row->image}}" height="50px" width="70px" alt=""></td>
      <td class="btn btn-danger text-decoration-none"><a href="admin/giaodiencapnhat/submit/{{$row->MaSP}}">Edit</a> </td>
      <td>
<form method="POST" action="admin/giaodiencapnhat/delete/{{$row->MaSP}}" onsubmit="return ConfirmDelete( this )">
        @csrf
        <button class="btn btn-primary" type="submit">Delete</button>
    </form>
</td> 
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection



</body>
</html>