@extends('master')
@section('content')
     <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Profile</h5>
              </div>
              <div class="card-body">
                 {{ Form::model($user, array(
                      'method' => 'PATCH',
                      'route' => array('user.profile.update')
                    ,'files'=>true)) }}
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        {!! Form::text('name', null, array( 'class'=>'form-control')) !!}						        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        {!! Form::text('email', null, array('class'=>'form-control', ($user->email != "") ? 'readonly': '') ) !!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="famale">Famale</option>
                        </select>
                        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone</label>
                         {!! Form::text('phone', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Phone')) !!}
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Whatsapp(WA)</label>
                         {!! Form::text('wa', null, array( 'class'=>'form-control', 'placeholder'=>'Whatsapp(WA)')) !!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Birthday</label>
                         {!! Form::date('birthday', null, array( 'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Birthday')) !!}
                        {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Photo</label>
                         {!! Form::file('photo', null, array( 'class'=>'form-control', 'placeholder'=>'photo')) !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    	<button type="submit" class="btn btn-primary btn-round">Save profile</button>
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection