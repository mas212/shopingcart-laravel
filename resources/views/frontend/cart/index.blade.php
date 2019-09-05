@extends('frontend.frontend')
@section('content')
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <div class="row">
                <table></table>
                @foreach($userCart as $cart)
                    <div class="col-lg-3">{{ $cart->name }}</div>
                    <div class="col-lg-1">{{ $cart->code }}</div>
                    <div class="col-lg-3">{{ $cart->price }}</div>
                    <div class="col-lg-1">
                        <a href="{{ url('cart/update-qty/'.$cart->id.'/1') }}">+</a>
                            <input type="text" value="{{ $cart->qty }}" class="form-controll">
                        @if($cart->qty > 1)
                        <a href="{{ url('cart/update-qty/'.$cart->id.'/-1') }}">-</a>
                        @endif
                    </div>
                    <div class="col-lg-2">
                        Total : {{ $cart->price * $cart->qty }}
                    </div>
                    <div class="col-lg-2" style="margin-bottom: 2%;">
                        {!! Form::open(['method' =>'DELETE', 'route'=>['cart.delete',$cart->id]]) !!}
                            {!! Form::submit('Hapus', ['class'=>'btn delete-product-dashboard btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                @endforeach
                <div class="btn-book">
                    <a href="{{ route('cart.checkout') }}" class="btn btn-success">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection


