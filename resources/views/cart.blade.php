@extends('template.mytemplate')
@section('content')

<table id="cart" class="table  table-condensed  bg-white" >
    <thead>
        <tr>
            <th style="width:50%">Tên phim</th>
            <th style="width:10%">Số tiền</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%" class="text-center">Tổng tiền</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
        @foreach(session('cart') as $masp => $details)
        @php $total += $details['gia'] * $details['quantity'] @endphp
        <tr data-id="{{ $masp }}">
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{ asset($details['image']) }}" width="100" height="100" class="img-responsive" /></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $details['tensp'] }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">{{ number_format($details['gia'],0) }}đ</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
            </td>
            <td data-th="Subtotal" class="text-center">{{ number_format($details['gia'] * $details['quantity'],0) }}đ</td>
            <td class="actions" data-th="">
                <!-- xóa sp trong giỏ hàng -->
                {!! Form::open(['method' => 'post','url'=>['remove-from-cart']]) !!}
                <div>
                    {{Form::hidden('masp',$details['masp'])}}
                    {{Form::submit('Xóa',['class'=>'btn btn-danger mt-3 mb-3','onclick'=>'return confirm("Bạn có thực sự muốn xóa không")'])}}
                </div>
                {!! Form::close() !!}

            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Tổng tiền {{ number_format($total,0) }}đ</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ asset('/home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua vé</a>
                <button class="btn btn-primary"><a class="text-decoration-none text-warning"href="{{asset('/thanh-toan/'.$total)}}">Thanh toán</a></button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('script')
<script type="text/javascript">
    $(".update-cart").change(function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ asset("update-cart") }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
</script>
@endsection