@extends('template.mytemplate');
    @section('chitietsanpham')

    <div class="container">
  <div class="row">
  @foreach ($sanpham as $row)
    <div class="col">
    <div class="card " style="width: 18rem;">
  <img src="{{asset($row->image)}}" class="card-img-top" alt="..." height="300px" >
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"></p>
    @if(Auth::check())
    <p class="btn-holder"><a href="{{ route('add.to.cart', $row->MaSP) }}" class="btn btn-warning btn-block text-center" role="button">Mua vé</a> </p>
    @else
    <p class="btn-holder"><a onclick="return confirm('Mời bạn đăng nhập để mua hàng')" href="{{ route('add.to.cart', $row->MaSP) }}" class="btn btn-warning btn-block text-center" role="button">Mua vé</a> </p>
      @endif
  </div>
</div>
    </div>
<div class="col text-white">

  <h3>{{$row->TenSP}}</h3>
  <h5>{{$row->gia}}đ</h5>
    <h4>{{$row->Mota}}</h4>
</div>
@endforeach
  </div>
  <form method="POST" action="" onsubmit="return ConfirmDelete( this )">
        @csrf
        <p>
            <label class="text-white" for="binhluan">Bình luận</label><br>
            <input class="form-control"style="width:400px" type="text" name="binhluan">
            <button class="btn btn-primary" type="submit">Bình luận</button>
        </p>
    </form>

</div>
    @endsection
