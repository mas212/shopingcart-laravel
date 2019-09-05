@extends('master')
@section('content')
   <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Products</h4>
                <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                   <a href="{{ route('product.create') }}" class="btn btn-primary btn-round">
                     Create Product
                   </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @if(!$products->isEmpty())
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Categories
                      </th>
                      <th>
                        Class
                      </th>
                      <th>
                        Code
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <td>
                          {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->category->name }}
                        </td>
                        <td>
                            {{ $product->classList->name }}
                        </td>
                        <td>
                            {{ $product->code }}
                        </td>
                        <td>
                            Rp {{ number_format($product->price, 0, ',','.') }}
                        </td>
                        <td>
                          <a href="{{ route('product.edit',$product->id) }}" class="btn btn-success btn-small"><span class="fa fa-pencil"></span>Edit</a>
                          {!! Form::open(['method' =>'DELETE', 'route'=>['product.destroy',$product->id]]) !!}
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