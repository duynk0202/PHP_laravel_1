<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thể loại</title>
</head>
<body>
        @extends('template.mytemplate');

    @section('theloai')
        {!!Form::open(['url'=>'/theloai/submit'])!!}

     {{Form::label('maloai','Mã Loai')}}
     {{Form::text('maloai','',['class'=> 'form-control','placeholder'=>'Nhập Mã Loại'])}}

     {{Form::label('tenloai','Tên Loại')}}
     {{Form::text('tenloai','',['class'=> 'form-control','placeholder'=>'Nhập thể loại phim'])}}
 
     {{Form::submit('Thêm thể loại phim',['class' =>'btn btn-primary'])}}
     {!!Form::close()!!}
    @endsection
</body>
</html>