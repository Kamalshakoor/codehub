@extends('layouts.front')

@section('content')
<div class="container mb-5">
  <div class="row">
    <div class="col-md-10">
      <div class="card offset-md-2 mt-5" id="details">
        <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top img-fluid" alt="Product Title">
        <div class="card-body">
          <h3 class="card-title text-center my-4">{{ $post->title }}</h3>
          <p class="card-text">{!! $post->description !!}</p>
          <div class="d-flex justify-content-between">
            <div>
              <span class="badge rounded-pill bg-info">{{ $post->subcategory->category->name }}</span>
              <span class="badge rounded-pill bg-info">{{ $post->subcategory->name }}</span>
            </div>
            <div>
              @php
              $ratenum = number_format($rating_value)
              @endphp
              @for($i = 1; $i <= $ratenum; $i++) <i class="fa fa-star rating"></i>
                @endfor
                @for ($j = $ratenum+1; $j <= 5; $j++) <i class="fa fa-star"></i>
                  @endfor
                  <span>{{ $ratings->count() }} Rating</span>
            </div>
          </div>
          <p class="text-success text-center"><b>{{ $post->price }}$</b></p>
        </div>
        <div class="row mb-5">
          <div class="col-md-6 offset-md-3 d-flex justify-content-center">
            <form action="{{ route('buyer.cart.add') }}" method="POST">
              @csrf
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              @if($rating_done)
              <button type="submit" class="btn btn-warning form-control">Add to cart</button>
              @else
              <button type="submit" class="btn btn-warning me-2">Add to cart</button>
              @endif
            </form>

            @if(!$rating_done)
            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Rate this product
            </button>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{ route('buyer.add-rating') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Rate this product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="rating-css">
                        <div class="star-icon">
                          <input type="radio" value="1" name="product_rating" checked id="rating1">
                          <label for="rating1" class="fa fa-star"></label>
                          <input type="radio" value="2" name="product_rating" id="rating2">
                          <label for="rating2" class="fa fa-star"></label>
                          <input type="radio" value="3" name="product_rating" id="rating3">
                          <label for="rating3" class="fa fa-star"></label>
                          <input type="radio" value="4" name="product_rating" id="rating4">
                          <label for="rating4" class="fa fa-star"></label>
                          <input type="radio" value="5" name="product_rating" id="rating5">
                          <label for="rating5" class="fa fa-star"></label>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection