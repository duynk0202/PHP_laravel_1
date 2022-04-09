@extends('template.mytemplate')
@section('phimhanhdong')
<div class="container">
  <div class="row">
    
       @foreach ($sanpham as $row)
    <div class="col-lg-4">
    <div class="card " style="width: 18rem;">
  <img src="{{asset($row->image)}}" class="card-img-top" alt="..." height="300px" >
  <div class="card-body">
   
    <p class="card-text">{{$row->tensp}}</p>
    <p class="card-text">{{$row->gia}}đ</p>
    <a href="admin/chitiet/{{$row->masp}}" class="btn btn-primary">Xem chi tiết</a>
  </div>
</div>
    </div>
  @endforeach
  </div>
</div>
@endsection