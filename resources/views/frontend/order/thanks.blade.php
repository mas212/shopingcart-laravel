@extends('frontend.frontend')
@section('content')
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <div class="row">
                <div class="col-lg-12 thankTitle">Thanks you for your order</div>
                <div class="col-lg-12 thankOrder">
                    your order number: <span class="orderNumber">{{ Session::get('order_id') }} </span>
                </div>
                <div class="col-lg-12 thankPrice">
                    Total : {{ Session::get('total_price') }}
                </div>
            </div>
        </div>
    </section>
@endsection
<?php 
    Session::forget('total_price');
    Session::forget('order_id');
?>


