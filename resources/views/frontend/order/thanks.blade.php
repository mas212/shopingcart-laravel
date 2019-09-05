@extends('frontend.frontend')
@section('content')
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <div class="row">
                <h1>Thanks Booking class see ou tommorow in class</h1>
                <b>our order number {{ Session::get('order_id') }} Total pament {{ Session::get('total_price') }}</b>
            </div>
        </div>
    </section>
@endsection
<?php 
    Session::forget('total_price');
    Session::forget('order_id');
?>


