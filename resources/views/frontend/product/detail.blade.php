@extends('frontend.frontend')
@section('content')
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-img">
                        <img src="{{ asset('products/'. $productDetail->photo) }}" alt="news image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <form name="addtocartForm" id="addtocartForm" method="post" action="{{ route('product.cart') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $productDetail->id }}">
                            <input type="hidden" name="name" value="{{ $productDetail->name }}">
                            <input type="hidden" name="code" value="{{ $productDetail->code }}">
                            <input type="hidden" name="price" value="{{ $productDetail->price }}">
                            <div class="product-name">
                                {{ $productDetail->name }}
                            </div>
                            <div class="product-price">
                                {{ $productDetail->price }}
                            </div>
                            <div class="product-date" style="margin-top: 10px; margin-bottom: 10px;">
                                <label>Start date</label>
                                {!! Form::date('start_date', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Start date')) !!}
                            </div>
                            <div class="product-date" style="margin-top: 10px; margin-bottom: 10px;">
                                <label>Choose time</label>
                                {!! Form::time('start_time', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Time')) !!}
                            </div>
                            <div class="product-qty" style="margin-top: 10px; margin-bottom: 10px;">
                                <label>QTY</label>
                                <input type="text" name="qty" value="1" class="form-control">
                            </div>
                            <div class="product-btn">
                                <button type="submit" class="btn btn-primary btn-round">BOOK CLASS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


