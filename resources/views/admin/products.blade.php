<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body >
@extends('admin.home')
<div class="container text-white">

     @section('products')
     @if(count($errors)>0)
     <h2>LỖI !!!</h2>
     @foreach($errors->all() as $error)
          {{$error}}<br>
     
     @endforeach
     @endif
     @if (isset($mess))
          {{mess}}
     @endif
     
     {!!Form::open(['url'=>'/products/submit','files'=>true])!!}
     {{Form::label('masp','Mã Phim',['class'=>'text-white'])}}
     {{Form::text('masp','',['class'=> 'form-control ','placeholder'=>'Nhập Mã Phim'])}}
     
     {{Form::label('tensp','Tên Phim',['class'=>'text-white'])}}
     {{Form::text('tensp','',['class'=> 'form-control','placeholder'=>'Nhập tên phim'])}}
     
     {{Form::label('mota','Mô tả',['class'=>'text-white'])}}
     {{Form::text('mota','',['class'=> 'form-control','placeholder'=>'Nhập mô tả'])}}
     
     {{Form::label('gia','Giá ',['class'=>'text-white'])}}
     {{Form::number('gia','',['class'=> 'form-control','placeholder'=>'Nhập giá'])}}
     
     {{Form::label('maloai','Mã loại',['class'=>'text-white'])}}
     {{Form::text('maloai','',['class'=> 'form-control','placeholder'=>'Mã loại'])}}
     
     
     {{Form::label('hinhsanpham','Hình sản phẩm',['class'=>'text-white'])}}
     {{Form::file('hinhsanpham',['class'=> 'form-control'])}}
     
     {{Form::submit('Thêm phim',['class' =>'btn btn-products btn-primary',])}}
     {!!Form::close()!!}
     @endsection
</div>

</body>
</html>