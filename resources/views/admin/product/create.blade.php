@extends('master')
@section('content')
     <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Product</h5>
              </div>
              <div class="card-body">
                {!! Form::open(array('route' => 'product.store', 'files'=>true)) !!}
				          {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name</label>
                        {!! Form::text('name', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Product name')) !!}
						              {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Categories</label>
                        <select class="form-control" name="category_id">
                          @if(!$categories->isEmpty())
                            @foreach($categories as $category)
                              <option value="{{ $category->id}}"> {{ $category->name }} </option>
                            @endforeach
                          @else
                            <p>Not found. Currently using default categories</p>
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Class</label>
                        <select class="form-control" name="class_id">
                          @if(!$classLists->isEmpty())
                            @foreach($classLists as $classList)
                              <option value="{{ $classList->id}}"> {{ $classList->name }} </option>
                            @endforeach
                          @else
                            <p>Not found. Currently using default class</p>
                          @endif
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Code</label>
                        {!! Form::text('code', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Code')) !!}
                          {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Price</label>
                        {!! Form::text('price', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Price')) !!}
                          {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Photo</label>
                        {!! Form::file('photo', null, array( 'class'=>'form-control', 'required'=>'required')) !!}
                          {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        {!! Form::textarea('description', null, array( 'class'=>'form-control', 'required'=>'required')) !!}
                          {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                    	<button type="submit" class="btn btn-primary btn-round">Save product</button>
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection