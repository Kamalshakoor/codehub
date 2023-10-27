@extends('seller.layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">Orders</div>
  <div class="card-body">
    @if($orders->count()>0)
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Buyer</th>
          <th>Project</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
        <tr>
          <td>{{ $order->buyer->name }}</td>
          <td>{{ $order->post->title }}</td>
          <td>${{ $order->post->price }}</td>
          @if($order->status)
          <td><span class="badge bg-info rounded-pill">Completed</span></td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Orders Yet</h3>
    @endif
  </div>
</div>

<div class="mt-4">
  {{ $orders->links() }}
</div>
@endsection