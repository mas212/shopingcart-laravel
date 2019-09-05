@extends('master')
@section('content')
   <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Class</h4>
                <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                   <a href="{{ route('class.create') }}" class="btn btn-primary btn-round">
                     Create Class
                   </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @if(!$class->isEmpty())
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                      @foreach($class as $classx)
                      <tr>
                        <td>
                          {{ $classx->name }}
                        </td>
                        <td>
                          <a href="{{ route('class.edit',$classx->id) }}" class="btn btn-success btn-small"><span class="fa fa-pencil"></span>Edit</a>
                          {!! Form::open(['method' =>'DELETE', 'route'=>['class.destroy',$classx->id]]) !!}
                              {!! Form::submit('Delete', ['class'=>'btn delete-product-dashboard btn-danger']) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    @else
                      <tbody>
                        <tr>Not found. Currently using default Class</tr>
                      </tbody>
                    @endif
                  </table>
                </div>
              </div>
            </div>
        </div>
@endsection