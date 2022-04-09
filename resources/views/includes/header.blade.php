<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="./resources/views/admin/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts  -->
    <!-- Styles -->

</head>
<body >
    <div id="app" class="text-white">
        <nav class="navbar navbar-expand-md navbar-light bg-black text-white shadow-sm">
           
            <nav class="navbar navbar-expand-lg navbar-light bg-black text-white">
  <div class="">
  <img src="{{asset('resources/images/logo.png')}}" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0  text-white" style="font-size: 15px;font-weight:500">
        <li class="nav-item">
          <a class="nav-link text-white active" aria-current="page" href=<?=url('xemspuser')?>>Home</a>
        </li>
        <li class="nav-item">

            <a class="nav-link text-white active" aria-current="page" href=<?=url('phimhanhdong')?>>Phim hành động</a>
        </li>
    
        <li class="nav-item">
        <a class="nav-link text-white active" href="<?=url('phimtinhcam')?>">
            Phim tình cảm
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-white active" href="<?=url('phimma')?>">
           Phim kinh dị
          </a>
        </li>
        <li class="nav-item" style="margin-right:20px;margin-top:-10px">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto text-white">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <div class="fruits-menu__cart">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">({{ count((array) session('cart')) }})</span>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Giỏ hàng</h2>
                                    @php $total = 0 @endphp
                                    @foreach((array) session('cart') as $masp => $details)
                                    @php $total += $details['gia'] * $details['quantity'] @endphp
                                    @endforeach

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    @if(session('cart'))
                                    @foreach(session('cart') as $masp => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 ">
                                            <img width=50px height=50px src="{{ asset($details['image']) }}" />
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['tensp'] }}</p>
                                            <span class="price text-info">{{ number_format($details['gia'],0) }}đ</span> <span class="count"> Số lượng:{{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <p class="h3 text-center text-secondary">Cart is null</p>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <h3>Total: <span class="text-info">{{ number_format($total,0) }}đ</span></h3>

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  
                                    <a href="<?=url('cart')?>" class="btn btn-primary btn-block">View all</a>
                                    <button class="btn btn-success"><a href="{{asset('/thanh-toan/'.$total)}}">Thanh toán</a></button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- cart -->

                    <!-- endcart -->
                </div>
        </li>
        <li class="nav-item">
            <div class="form-header">
                          <form role="search" method=get id="searchform" action="{{asset('/search')}}">
                              <input type="text" value="" name="key" class="form-control" placeholder="Tìm kiếm">
                              <button class="btn btn-primary" type="submit" id="searchsubmit">Tìm kiếm</button>
                          </form>
                      </div>

        </li>
      
      </ul>
    </div>
  </div>
</nav>

                
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
