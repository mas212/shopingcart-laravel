@extends('master')
@section('content')
   <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Reservation</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    @if(!$orders->isEmpty())
                    <thead class=" text-primary">
                      <th>
                        User
                      </th>
                      <th>
                        Product
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                         Total
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                      <tr>
                        <td>
                          {{ $order->user->name }}
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            {{ number_format($order->total_price, 0, ',','.') }}
                        </td>
                        <td>
                            {{ $order->status }}
                        </td>
                        <td>
                          
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    @else
                      <tbody>
                        <tr>Not found. Currently using default reservation</tr>
                      </tbody>
                    @endif
                  </table>
                </div>
              </div>
            </div>
        </div>
@endsection