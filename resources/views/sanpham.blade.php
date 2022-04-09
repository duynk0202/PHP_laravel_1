@extends('template.mytemplate')
    @section('sanpham')
    <div class="container">
      <div class="row">
      <form>
            <label for="orderby" class="text-white">Lọc giá</label>
            @csrf
            <select name="orderby" id="orderby" class="orderby">
                
                <option value="{{Request::url()}}?orderby=none">Mặc định</option>
                <option value="{{Request::url()}}?orderby=gia_min">Giá từ thấp đến cao</option>
                <option value="{{Request::url()}}?orderby=gia_max">Giá từ cao đến thấp</option>
                
            </select>
            <form role="search" method=get id="searchform" action="{{asset('/search')}}">
                              <button class="btn btn-primary" type="submit" id="searchsubmit">Tìm kiếm</button>
                          </form>
        </form>
    @foreach ($sanpham as $row)
   
    <div class="col-lg-4 cart-margin">
    <div class="card " style="width: 18rem;">
  <img src="{{$row->image}}" class="card-img-top" alt="..." height="300px" >
  <div class="card-body">
  
    <p class="card-text">{{$row->TenSP}}</p>
    <p class="card-text">{{$row->gia}}</p>
    <a href="admin/chitiet/{{$row->MaSP}}" class="btn btn-primary">Xem chi tiết</a>
  </div>
</div>
    </div>
 
  @endforeach
  
  </div>
  <span class="pagination-sanpham">  {{$sanpham->links('vendor.pagination.bootstrap-4') }}</span>
</div>

<script>
        $(document).ready(function(){
            $('#orderby').on('change',function(){
                var url=$(this).val();
                if(url){
                    window.location=url;
                }
                return false;
            })
        })
       
    </script>

    @endsection
<style>
  .w-5{
    
    display:none;
    justify-content:center;
  }
</style>



