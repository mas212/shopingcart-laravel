@extends('frontend.frontend')
@section('content')
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <div class="col-lg-12">
                <h3>ORDER REVIEW</h3>
            </div>
            <div class="row">
                <div class="col-lg-5">Name</div>
                <div class="col-lg-2">:</div>
                <div class="col-lg-5">{{ $billMember->name }}</div>
            </div>
            <div class="row">
                <div class="col-lg-5">Email</div>
                <div class="col-lg-2">:</div>
                <div class="col-lg-5">{{ $billMember->email }}</div>
            </div>
            <div class="row">
                <div class="col-lg-5">Phone</div>
                <div class="col-lg-2">:</div>
                <div class="col-lg-5">{{ $billMember->phone }}</div>
            </div>
            <div class="row">
                <div class="col-lg-5">Address</div>
                <div class="col-lg-2">:</div>
                <div class="col-lg-5">{{ $billMember->address }}</div>
            </div>
        </div>
    </section>
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <div class="row">
                <?php $total_amount = 0;?>
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
                         {{ $cart->price * $cart->qty }}
                    </div>
                    <div class="col-lg-2" style="margin-bottom: 2%;">
                        {!! Form::open(['method' =>'DELETE', 'route'=>['cart.delete',$cart->id]]) !!}
                            {!! Form::submit('Hapus', ['class'=>'btn delete-product-dashboard btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                    <?php $total_amount = $total_amount + ($cart->price*$cart->qty);?>
                @endforeach
                 <div class="col-lg-12">
                        Cart Sub Total : {{ $total_amount }} 
                </div>
                <div class="col-lg-12">
                        <b>Grand Total</b>: {{ $total_amount }} 
                </div>
                <div class="col-lg-12">
                    <form action="{{ route('cart.order') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="total_price" value="{{ $total_amount }}">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-warning">
                                Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


