@extends('frontend.frontend')
@section('content')

    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <h3 class="tittle  text-center my-lg-5 my-3">Class</h3>

            <div class="row news-grids pb-lg-5 mt-3 mt-lg-5">
               @if(!$products->isEmpty())
               @foreach($products as $product)
                <div class="col-lg-4 gal-img">
                    <div class="gal-info">
                        <a href="{{ route('product-detail.detail', $product->id) }}">
                          <img src="{{ asset('products/'. $product->photo) }}" alt="news image" class="img-fluid">
                        </a>
                        <div class="property-info-list">
                            <div class="detail">
                                <h4 class="title">
                                    <a href="about.html">{{$product->name}}</a>
                                </h4>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span class="fa fa-clock-o"></span> {{ $product->category->name }}
                                    </li>
                                    <li>
                                        <span class="fa fa-clock-o"></span> {{ $product->classList->name }}
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-properties">
                                <a class="admin" href="#">
                                <span class="fa fa-user"></span> Admin
                            </a>
                                <span class="year text-right"> <span class="fa fa-calendar"></span> Rp {{ number_format($product->price, 0, ',','.') }}</span>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                  <p>Product empty</p>
                @endif

            </div>

        </div>
    </section>

@endsection


