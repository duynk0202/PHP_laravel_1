
    @extends('template.mytemplate')
    @section('search')
    <div class="container">
      <div class="row">  
    @foreach ($sanpham as $row)
    <div class="col-lg-4 cart-margin">
    <div class="card " style="width: 18rem;">
  <a href="{{asset('/admin/chitiet/'.$row->MaSP)}}">
      <img src="{{$row->image}}" class="card-img-top" alt="..." height="300px" >
  </a>
  <div class="card-body">
    <p class="card-text">{{$row->TenSP}}</p>    
    <p class="card-text"> {{number_format($row->gia, 0)}}<sup>đ</sup></p>
    <a href="admin/chitiet/{{$row->MaSP}}" class="btn btn-primary">Xem chi tiết</a>
  </div>
</div>
    </div>
 
  @endforeach
  
  </div>
 
</div>
<style>
  .w-5{
    
    display:none;
    justify-content:center;
  }
</style>  
@endsection