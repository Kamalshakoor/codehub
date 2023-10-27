@extends('layouts.front')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <h2 class="text-center my-5">In Your Shopping Cart: <span class="text-info">{{ Cart::content()->count() }}
          items</span></h2>
      <div class="card my-3" id="details">
        <div class="card-body">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th></th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach (Cart::content() as $post)
              <tr>
                <th><img src="{{ asset('storage/'.$post->model->image) }}" width="120px" height="80px" alt=""></th>
                <td>{{ $post->name }}</td>
                <td>${{ $post->price }}</td>
                <td>
                  <a href="{{route('buyer.cart.delete',$post->rowId)}}">
                    <i class="fa fa-trash mb-1 text-danger"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 offset-md-1 my-5 text-center">
      <h2 class="text-center">Cart Totals</h2>
      <h5 class="text-center my-4">Total: <span class="text-info">${{ Cart::total() }}</span></h5>
      <a href="{{ route('buyer.cart.checkout') }}" class="btn btn-info rounded-pill text-white fw-bold"
        style="padding: 11px 80px;">CHECKOUT</a>
    </div>
  </div>
</div>




@endsection