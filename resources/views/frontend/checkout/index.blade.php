@extends('frontend.frontend')
@section('content')
    <section class="portfolio-flyer py-5" id="gallery">
        <div class="container pt-lg-3 pb-md-5">
               <h1>Bill To</h1>
               <form method="post" action="{{ route('cart.checkout') }}">
                   {{ csrf_field() }}
                   <div class="row">
                       <div class="col-md-6">
                           <label>Full name</label>
                           {!! Form::text('name', null, array( 'class'=>'form-control', 'required'=>'required')) !!}
                       </div>
                       <div class="col-md-6">
                            <label>Email</label>
                           {!! Form::text('email', null, array( 'class'=>'form-control', 'required'=>'required')) !!}
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
                       <button class="btn btn-danger">
                           Checkout 
                       </button>
                   </div>
               </form>
        </div>
    </section>
@endsection


