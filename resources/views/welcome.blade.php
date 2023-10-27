@extends('layouts.front')

@section('header')
<div class="container-fluid" id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-white text-center">
                <h4>Websites codes, Templates, Games and Apps Digital MarketPlace</h4>
                <div class="row">
                    <div class="col-md-6 offset-md-3 mt-2">
                        <h6>Best Place to buy and sell digital products</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="container-fluid col-md-12 col-lg-8 offset-lg-2 mt-3">
                        <form action="{{ route('search-results') }}" method="GET">
                            <div class="input-group" id="searchicon">
                                <input type="text" name="search" class="form-control" placeholder="Start Searching..."
                                    aria-label="Start Searching" aria-describedby="basic-addon1">
                                <button class="input-group-text" type="submit">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-11 offset-md-1 col-lg-10 offset-lg-2 offset-0 col-12">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <a href="{{ route('projects.category',1) }}"><img height="100px" width="100px" id="wordpress"
                                src="{{ asset('app/images/wordPress.jpg') }}" alt="wordPress"></a>
                    </div>
                    <div class="col-md-2 col-4">
                        <a href="{{ route('projects.category',2) }}"><img height="100px" width="100px" id="html"
                                src="{{ asset('app/images/html.png') }}" alt="html5"></a>
                    </div>
                    <div class="col-md-2 col-4">
                        <a href="{{ route('projects.category',3) }}"><img height="100px" width="100px" id="android"
                                src="{{ asset('app/images/Android.png') }}" alt="Android"></a>
                    </div>
                    <div class="col-md-2 col-4 mt-4 offset-2 offset-md-0 mt-md-0">
                        <a href="{{ route('projects.category',4) }}"><img height="100px" width="100px" id="ios"
                                src="{{ asset('app/images/IOS.jpg') }}" alt="IOS"></a>
                    </div>
                    <div class="col-md-2 col-4 mt-4 mt-md-0">
                        <a href="{{ route('projects.category',5) }}"><img height="100px" width="100px" id="unity"
                                src="{{ asset('app/images/unity.png') }}" alt="Gaming"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid mb-5 pt-5 bg-light">
    <!-- most selled WordPress Themes starts from here -->
    <div class="row">
        <div class="col-md-12 text-center mb-5 text-info">
            <h2>Most Selled WordPress Themes</h2>
        </div>
    </div>

    <div class="row">
        @php
        $wordpressCount = 0;
        @endphp
        @foreach ($posts as $post)
        @if($post->subcategory->category->name == 'WordPress')
        @php
        $wordpressCount++;
        @endphp
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card">
                <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="..." style="height: 14rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $post->title }}</h5>
                    <div class="d-flex mt-4">
                        <div>
                            <h6 class="text-success">{{ $post->price }}$</h6>
                        </div>
                        <div class="ms-auto">
                            @php
                            $rating_sum = 0;
                            @endphp
                            @if($post->ratings->count() > 0)
                            @foreach ($post->ratings as $rating)
                            @php
                            $rating_sum = $rating_sum + $rating->stars_rated;
                            @endphp
                            @endforeach
                            @php
                            $rating_value = $rating_sum/$post->ratings->count();
                            $ratenum = number_format($rating_value);
                            @endphp
                            @for($i = 1; $i <= $ratenum; $i++) <i class="fa fa-star rating"></i>
                                @endfor
                                @for ($j = $ratenum+1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                    @endfor
                                    <span class="">{{ $post->ratings->count() }} Ratings</span>
                                    @else
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>0 Ratings</span>
                                    @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body d-flex justify-content-between">
                    <a href="{{ route('buyer.single.post',$post->id) }}" class="btn btn-info">View Detail</a>
                    <form action="{{ route('buyer.cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-warning">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    @if($wordpressCount)
    <div class="row mt-3 mb-5">
        <div class="col-md-4 offset-md-4 text-center">
            <h4> <a href="{{ route('projects.category',1) }}" class="text-danger" id="seeallproducts">See All WordPress
                    Themes > > ></a></h4>
        </div>
    </div>
    @else
    <h4 class="text-center mb-4">No Wordpress Themes Yet.</h4>
    @endif


    <!-- most selled Html Design starts from here -->
    <div class="row">
        <div class="col-md-12 text-center mb-5 mt-3 text-info">
            <h1>Most Selled Html Designs</h1>
        </div>
    </div>

    <div class="row">
        @php
        $htmlCount = 0;
        @endphp
        @foreach ($posts as $post)
        @if($post->subcategory->category->name == 'Web')
        @php
        $htmlCount++;
        @endphp
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card">
                <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="..." style="height: 14rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $post->title }}
                    </h5>
                    <div class="d-flex mt-4">
                        <div>
                            <h6 class="text-success">{{ $post->price }}$</h6>
                        </div>
                        <div class="ms-auto">
                            @php
                            $rating_sum = 0;
                            @endphp
                            @if($post->ratings->count() > 0)
                            @foreach ($post->ratings as $rating)
                            @php
                            $rating_sum = $rating_sum + $rating->stars_rated;
                            @endphp
                            @endforeach
                            @php
                            $rating_value = $rating_sum/$post->ratings->count();
                            $ratenum = number_format($rating_value);
                            @endphp
                            @for($i = 1; $i <= $ratenum; $i++) <i class="fa fa-star rating"></i>
                                @endfor
                                @for ($j = $ratenum+1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                    @endfor
                                    <span class="">{{ $post->ratings->count() }} Ratings</span>
                                    @else
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>0 Ratings</span>
                                    @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body d-flex justify-content-between">
                    <a href="{{ route('buyer.single.post',$post->id) }}" class="btn btn-info">View Detail</a>
                    <form action="{{ route('buyer.cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-warning">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    @if($htmlCount)
    <div class="row mt-3 mb-5">
        <div class="col-md-4 offset-md-4 text-center">
            <h4> <a href="{{ route('projects.category',2) }}" class="text-danger" id="seeallproducts">See All HTML(Web)
                    Themes > > ></a></h4>
        </div>
    </div>
    @else
    <h4 class="text-center mb-4">No Web Themes Yet.</h4>
    @endif
    <!-- most selled Html Design ends here -->


    <!-- most selled Android Apps start from here -->
    <div class="row">
        <div class="col-md-12 text-center mb-5 mt-3 text-info">
            <h1>Most Selled Android Apps</h1>
        </div>
    </div>

    <div class="row">
        @php
        $androidAppsCount = 0;
        @endphp
        @foreach ($posts as $post)
        @if($post->subcategory->category->name == 'Android Apps')
        @php
        $androidAppsCount++;
        @endphp
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card">
                <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="..." style="height: 14rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $post->title }}</h5>
                    <div class="d-flex mt-4">
                        <div>
                            <h6 class="text-success">{{ $post->price }}$</h6>
                        </div>
                        <div class="ms-auto">
                            @php
                            $rating_sum = 0;
                            @endphp
                            @if($post->ratings->count() > 0)
                            @foreach ($post->ratings as $rating)
                            @php
                            $rating_sum = $rating_sum + $rating->stars_rated;
                            @endphp
                            @endforeach
                            @php
                            $rating_value = $rating_sum/$post->ratings->count();
                            $ratenum = number_format($rating_value);
                            @endphp
                            @for($i = 1; $i <= $ratenum; $i++) <i class="fa fa-star rating"></i>
                                @endfor
                                @for ($j = $ratenum+1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                    @endfor
                                    <span class="">{{ $post->ratings->count() }} Ratings</span>
                                    @else
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>0 Ratings</span>
                                    @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body d-flex justify-content-between">
                    <a href="{{ route('buyer.single.post',$post->id) }}" class="btn btn-info">View Detail</a>
                    <form action="{{ route('buyer.cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-warning">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    @if($androidAppsCount)
    <div class="row mt-3 mb-5">
        <div class="col-md-4 offset-md-4 text-center">
            <h4> <a href="{{ route('projects.category',3) }}" class="text-danger" id="seeallproducts">See All Android
                    Apps > > ></a></h4>
        </div>
    </div>
    @else
    <h4 class="text-center mb-4">No Android Apps Yet.</h4>
    @endif
    <!-- most selled Android Apps ends Here from here -->





    <!-- most selled IOS Apps start Here from here -->
    <div class="row">
        <div class="col-md-12 text-center mb-5 mt-3 text-info">
            <h1>Most Selled IOS Apps</h1>
        </div>
    </div>

    <div class="row">
        @php
        $iosAppsCount = 0;
        @endphp
        @foreach ($posts as $post)
        @if($post->subcategory->category->name == 'IOS Apps')
        @php
        $iosAppsCount++;
        @endphp
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card">
                <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="..." style="height: 14rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $post->title }}</h5>
                    <div class="d-flex mt-4">
                        <div>
                            <h6 class="text-success">{{ $post->price }}$</h6>
                        </div>
                        <div class="ms-auto">
                            @php
                            $rating_sum = 0;
                            @endphp
                            @if($post->ratings->count() > 0)
                            @foreach ($post->ratings as $rating)
                            @php
                            $rating_sum = $rating_sum + $rating->stars_rated;
                            @endphp
                            @endforeach
                            @php
                            $rating_value = $rating_sum/$post->ratings->count();
                            $ratenum = number_format($rating_value);
                            @endphp
                            @for($i = 1; $i <= $ratenum; $i++) <i class="fa fa-star rating"></i>
                                @endfor
                                @for ($j = $ratenum+1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                    @endfor
                                    <span class="">{{ $post->ratings->count() }} Ratings</span>
                                    @else
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>0 Ratings</span>
                                    @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body d-flex justify-content-between">
                    <a href="{{ route('buyer.single.post',$post->id) }}" class="btn btn-info">View Detail</a>
                    <form action="{{ route('buyer.cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-warning">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    @if($iosAppsCount)
    <div class="row mt-3 mb-5">
        <div class="col-md-4 offset-md-4 text-center">
            <h4> <a href="{{ route('projects.category',4) }}" class="text-danger" id="seeallproducts">See All IOS Apps >
                    > ></a></h4>
        </div>
    </div>
    @else
    <h4 class="text-center mb-4">No IOS Apps Yet.</h4>
    @endif
    <!-- most selled IOS Apps ends Here from here -->




    <!-- most selled Games start Here from here -->
    <div class="row">
        <div class="col-md-12 text-center mb-5 mt-3 text-info">
            <h1>Most Selled Games</h1>
        </div>
    </div>

    <div class="row">
        @php
        $gamesCount = 0;
        @endphp
        @foreach ($posts as $post)
        @if($post->subcategory->category->name == 'Games')
        @php
        $gamesCount++;
        @endphp
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card">
                <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="..." style="height: 14rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $post->title }}</h5>
                    <div class="d-flex mt-4">
                        <div>
                            <h6 class="text-success">{{ $post->price }}$</h6>
                        </div>
                        <div class="ms-auto">
                            @php
                            $rating_sum = 0;
                            @endphp
                            @if($post->ratings->count() > 0)
                            @foreach ($post->ratings as $rating)
                            @php
                            $rating_sum = $rating_sum + $rating->stars_rated;
                            @endphp
                            @endforeach
                            @php
                            $rating_value = $rating_sum/$post->ratings->count();
                            $ratenum = number_format($rating_value);
                            @endphp
                            @for($i = 1; $i <= $ratenum; $i++) <i class="fa fa-star rating"></i>
                                @endfor
                                @for ($j = $ratenum+1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                    @endfor
                                    <span class="">{{ $post->ratings->count() }} Ratings</span>
                                    @else
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>0 Ratings</span>
                                    @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body d-flex justify-content-between">
                    <a href="{{ route('buyer.single.post',$post->id) }}" class="btn btn-info">View Detail</a>
                    <form action="{{ route('buyer.cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-warning">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    @if($gamesCount)
    <div class="row mt-3 mb-5">
        <div class="col-md-4 offset-md-4 text-center">
            <h4> <a href="{{ route('projects.category',5) }}" class="text-danger" id="seeallproducts">See All Games > >
                    ></a></h4>
        </div>
    </div>
    @else
    <h4 class="text-center mb-4">No Games Yet.</h4>
    @endif

    <!-- most selled Games ends Here from here -->

</div>
@endsection