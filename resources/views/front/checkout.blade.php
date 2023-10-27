@extends('layouts.front')

@section('content')
<div class="container my-5">
  <div class="row g-5">
    <div class="col-md-5 col-lg-4 order-md-last">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-info">Your cart</span>
        <span class="badge bg-info rounded-pill">{{ Cart::content()->count() }}</span>
      </h4>
      <ul class="list-group mb-3">
        @foreach (Cart::content() as $item)
        <li class="list-group-item d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0">{{ $item->name }}</h6>
          </div>
          <span class="text-muted">${{ $item->price }}</span>
        </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>${{ Cart::total() }}</strong>
        </li>
      </ul>
    </div>

    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Billing address</h4>
      @include('partials.errors')
      <form class="needs-validation" action="{{ route('buyer.checkout') }}" method="POST">
        @csrf
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="firstName" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstName" name="firstName">
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lastName">
          </div>

          <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
          </div>

          <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
          </div>

          <div class="col-md-5">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country">
          </div>

          <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="state" name="state">
          </div>

          <div class="col-md-3">
            <label for="zip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip">
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-info text-white btn-lg" type="submit">Continue to checkout</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection