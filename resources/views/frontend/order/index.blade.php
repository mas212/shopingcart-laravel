@extends('frontend.frontend')
@section('content')
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <div class="col-lg-12">
                <div class="review">
                    <h3>ORDER REVIEW</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 order-review-label">Name</div>
                <div class="col-lg-2">:</div>
                <div class="col-lg-5 order-review-label">{{ $billMember->name }}</div>
            </div>
            <div class="row">
                <div class="col-lg-5 order-review-label">Email</div>
                <div class="col-lg-2">:</div>
                <div class="col-lg-5 order-review-label">{{ $billMember->email }}</div>
            </div>
            <div class="row">
                <div class="col-lg-5 order-review-label">Phone</div>
                <div class="col-lg-2">:</div>
                <div class="col-lg-5 order-review-label">{{ $billMember->phone }}</div>
            </div>
            <div class="row">
                <div class="col-lg-5 order-review-label">Address</div>
                <div class="col-lg-2">:</div>
                <div class="col-lg-5 order-review-label">{{ $billMember->address }}</div>
            </div>
        </div>
    </section>
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
            <div class="row">
                <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            <?php $total_amount = 0;?>
                @foreach($userCart as $cart)
              <tr>
                <td>
                  <div class="media">
                    <div class="media-body">
                      <p>{{ $cart->name }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  {{ $cart->price }}
                </td>
                <td>
                  <div class="product_count">
                    <span class="input-number-decrement">
                        <a href="{{ url('cart/update-qty/'.$cart->id.'/1') }}">+</a>
                    </span>
                    <input class="input-number" type="text" value="{{ $cart->qty }}" min="0" max="10">
                    <span class="input-number-increment">
                        <a href="{{ url('cart/update-qty/'.$cart->id.'/-1') }}">-</a>
                    </span>
                  </div>
                </td>
                <td>
                  {{ $cart->price * $cart->qty }}
                </td>
                <td>
                    {!! Form::open(['method' =>'DELETE', 'route'=>['cart.delete',$cart->id]]) !!}
                            {!! Form::submit('Hapus', ['class'=>'btn delete-product-dashboard btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
              <?php $total_amount = $total_amount + ($cart->price*$cart->qty);?>
            @endforeach
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  {{ $total_amount }} 
                </td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                      <h5>Total</h5>
                  </td>
                  <td>
                      <h5>{{ $total_amount }}</h5> 
                  </td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                  </td>
                  <td>
                      <form action="{{ route('cart.order') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="total_price" value="{{ $total_amount }}">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-warning">
                                Order now
                            </button>
                        </div>
                    </form>
                  </td>
              </tr>
              
            </tbody>
          </table>
            </div>
        </div>
    </section>
@endsection


