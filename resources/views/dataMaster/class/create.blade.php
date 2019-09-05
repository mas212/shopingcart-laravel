@extends('master')
@section('content')
     <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Class</h5>
              </div>
              <div class="card-body">
                {!! Form::open(array('route' => 'class.store')) !!}
				          {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Name</label>
                        {!! Form::text('name', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Class name')) !!}
						              {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    	<button type="submit" class="btn btn-primary btn-round">Save class</button>
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection