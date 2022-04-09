<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thể loại</title>
</head>
<body>
@extends('admin.home')
@if(count($errors)>0)
<div class="text-white">

    <h2 >LỖI !!!</h2>
    @foreach($errors->all() as $error)
         {{$error}}<br>

    @endforeach
    @endif
    @if (isset($mess))
         {{mess}}
    @endif
</div>
    @section('theloai')
        {!!Form::open(['url'=>'/theloai/submit'])!!}

     {{Form::label('maloai','Mã Loại',['class'=>'text-white'])}}
     {{Form::text('maloai','',['class'=> 'form-control','placeholder'=>'Nhập Mã Loại'])}}

     {{Form::label('tenloai','Tên Loại',['class'=>'text-white'])}}
     {{Form::text('tenloai','',['class'=> 'form-control ','placeholder'=>'Nhập thể loại phim'])}}
 
     {{Form::submit('gui',['class'=>'btn btn-primary mt-3 mb-3'])}}
     {!!Form::close()!!}
    @endsection
</body>
</html>