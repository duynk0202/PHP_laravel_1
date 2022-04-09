<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('template.mytemplate');
<div style="">
</div>

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
     {{Form::label('masp','Mã Phim')}}
     
     {{Form::text('masp','',['class'=> 'form-control','placeholder'=>'Nhập Mã Phim'])}}

     {{Form::label('tensp','Tên Phim')}}
     {{Form::text('tensp','',['class'=> 'form-control','placeholder'=>'Nhập tên phim'])}}

     {{Form::label('mota','Mô tả')}}
     {{Form::text('mota','',['class'=> 'form-control','placeholder'=>'Nhập mô tả'])}}

     {{Form::label('gia','Giá ')}}
     {{Form::number('gia','',['class'=> 'form-control','placeholder'=>'Nhập giá'])}}

     {{Form::label('maloai','Mã loại')}}
     {{Form::text('maloai','',['class'=> 'form-control','placeholder'=>'Mã loại'])}}


     {{Form::label('hinhsanpham','Hình sản phẩm')}}
     {{Form::file('hinhsanpham',['class'=> 'form-control'])}}

     {{Form::submit('Thêm phim',['class' =>'btn btn-primary'])}}
     {!!Form::close()!!}
     @endsection
</body>
</html>