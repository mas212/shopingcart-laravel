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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-date" style="margin-top: 10px; margin-bottom: 10px;">
                                        <label style="font-weight: bold;font-size: 14px;">DATE</label>
                                        {!! Form::text('start_date', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Start date', 'id'=>'start_date')) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="product-date" style="margin-top: 10px; margin-bottom: 10px;">
                                        <label style="font-weight: bold;font-size: 14px;">TIME</label>
                                        {!! Form::time('start_time', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Time', 'id'=>'start_time')) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="product-qty" style="margin-top: 10px; margin-bottom: 10px;">
                                        <label style="font-weight: bold;font-size: 14px;">QTY</label>
                                        <input type="text" name="qty" value="1" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="product-btn">
                                <button type="submit" class="btn btn-warning btn-round">BOOK CLASS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


