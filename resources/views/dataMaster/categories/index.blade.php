@extends('master')
@section('content')
   <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Categories</h4>
                <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                   <a href="{{ route('category.create') }}" class="btn btn-primary btn-round">
                     Create Categories
                   </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @if(!$categories->isEmpty())
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                      <tr>
                        <td>
                          {{ $category->name }}
                        </td>
                        <td>
                          <a href="{{ route('category.edit',$category->id) }}" class="btn btn-success btn-small"><span class="fa fa-pencil"></span>Edit</a>
                          {!! Form::open(['method' =>'DELETE', 'route'=>['category.destroy',$category->id]]) !!}
                              {!! Form::submit('Delete', ['class'=>'btn delete-product-dashboard btn-danger']) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    @else
                      <tbody>
                        <tr>Not found. Currently using default categories</tr>
                      </tbody>
                    @endif
                  </table>
                </div>
              </div>
            </div>
        </div>
@endsection