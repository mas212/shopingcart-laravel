@extends('frontend.frontend')
@section('content')
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
               <div class="checkoutTitle">
                  <h1>Bill To</h1>
               </div>
               <form method="post" action="{{ route('cart.checkout') }}">
                   {{ csrf_field() }}
                   <div class="row">
                       <div class="col-md-6">
                           <label>Full name</label>
                           <input type="text" name="name" class="form-control" value="{{$userDetails->name}}">
                       </div>
                       <div class="col-md-6">
                            <label>Email</label>
                           <input type="text" name="email" class="form-control" value="{{$userDetails->email}}">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-12">
                           <label>Phone</label>
                          {!! Form::text('phone', null, array( 'class'=>'form-control', 'required'=>'required')) !!}
                       </div>
                   </div>
                    <div class="row">
                       <div class="col-md-12">
                           <label>Address</label>
                           {!! Form::text('address', null, array( 'class'=>'form-control', 'required'=>'required')) !!}
                       </div>
                   </div>
                   <div class="row">
                       <button class="btn btn-danger" id="btn-checkout">
                           Checkout 
                       </button>
                   </div>
               </form>
        </div>
    </section>
@endsection


