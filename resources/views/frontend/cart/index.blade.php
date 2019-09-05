@extends('frontend.frontend')
@section('content')
      <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
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
                  <h5>{{ $cart->price }}</h5>
                </td>
                <td>
                  <div class="product_count">
                    <span class="input-number-decrement">
                        <a href="{{ url('cart/update-qty/'.$cart->id.'/1') }}">+</a>
                    </span>
                    <input class="input-number" type="text" value="1" min="0" max="10">
                    <span class="input-number-increment">
                        <a href="{{ url('cart/update-qty/'.$cart->id.'/-1') }}">-</a>
                    </span>
                  </div>
                </td>
                <td>
                  <h5>{{ $cart->price * $cart->qty }}</h5>
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
                  <h5>{{ $total_amount }} </h5>
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
                      {{ $total_amount }} 
                  </td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                  </td>
                  <td>
                      <a href="{{ route('cart.checkout') }}" class="btn btn-warning">
                            Checkout
                      </a>
                  </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
  </section>
@endsection


