<!doctype html>
<html lang="en">

<head>
  <title>CodeHub</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link rel="stylesheet" href="{{ asset('app/css/index.css') }}">


</head>

<body>
  <div class="container-fluid bg-dark">
    <div class="row">
      <div class="col-md-6">
        <h6 id="contactsupport" class="mt-1 text-white"><a class="text-white"
            href="mailto:kamalshakoor29022000@gmail.com"> ContactSupport@gmail.com </a> </h6>
      </div>
      <div class="col-md-6">
        <div class="text-end " id="google_translate_element"></div>
      </div>
    </div>
  </div>


  <!-- Navbar starts here -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand pe-5" href="{{ route('welcome') }}">
        <img src="{{ asset('app/images/codehub1.png') }}" alt="" width="100px" height="50px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('welcome') }}">Home</a>
          </li>
          @foreach ($categories as $category)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              {{ $category->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach ($category->subcategories as $subcategory)
              <li><a class="dropdown-item" href="{{ route('projects.subcategory',$subcategory->id) }}">{{
                  $subcategory->name }}</a></li>
              @endforeach
            </ul>
          </li>
          @endforeach
        </ul>

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link btn-success text-white rounded" data-bs-toggle="modal" data-bs-target="#sellersignup"
              href="#" type="submit" id="seller">Start Selling</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-danger rounded text-white" id="userlogin" data-bs-toggle="modal"
              data-bs-target="#userloginModal" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa-solid fa-cart-arrow-down btn position-relative" type="button" data-bs-toggle="modal"
                data-bs-target="#cartmodal"><span
                  class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                  {{ Cart::content()->count() }}
                </span></i>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar ends here -->


  <!--Seller Signup Start Here Modal -->
  <div class="modal fade" id="sellersignup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title w-100 text-center text-white" id="exampleModalLabel">Start Selling By
            Creating Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('seller.register') }}">
            @csrf
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h6>Name:</h6>
                  <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name..." required>
                </div>
                <div class="col-md-12 mt-3">
                  <h6>Email:</h6>
                  <input class="form-control" type="email" name="email" id="email" placeholder="example@gmail.com">
                </div>
                {{-- <div class="col-md-12 mt-3">
                  <h6>Number :</h6>
                  <input class="form-control" type="number" name="sellernumber" id="sellernumber"
                    placeholder="Must Use Country code">
                </div> --}}
                <div class="col-md-12 mt-3">
                  <h6>Password:</h6>
                  <input class="form-control" type="password" name="password" id="password"
                    placeholder="choose strong password to make your account strong">
                </div>
                <div class="col-md-12 mt-3">
                  <h6>Confirm Password:</h6>
                  <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Password and confirm password should match">
                </div>
                <div class="col-md-8 offset-md-2 text-center mt-3">
                  <p>By Clicking on Sign Up, you agreed with the <a href="#">Term & policy</a> of
                    CodeHub</p>
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-end mt-3">
                <button type="cancel" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
            </div>
          </form>
        </div>
        <hr>
        <h6 class="text-center pb-3">Already Have an Account? <a class="btn text-primary" data-bs-toggle="modal"
            data-bs-dismiss="modal" data-bs-target="#sellerlogin">Click Here</a> To Login</h6>
      </div>
    </div>
  </div>
  <!--Seller Signup Ends Here Modal -->


  <!--Seller login Modal starts Here  -->
  <div class="modal fade" id="sellerlogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Sell Your Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('seller.login.submit') }}">
            @csrf
            <div class="container">
              <div class="row">
                <div class="col-md-12 mt-3">
                  <h6>Email:</h6>
                  <input class="form-control" type="email" name="email" id="email" placeholder="example@gmail.com">
                </div>
                <div class="col-md-12 mt-3">
                  <h6>Password:</h6>
                  <input class="form-control" type="password" name="password" id="password"
                    placeholder="Enter Password...">
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-end mt-3">
                <button type="cancel" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Seller login Modal ends Here  -->


  <!--Buyer login Modal Starts Here  -->
  <div class="modal fade" id="userloginModal" tabindex="-1" aria-labelledby="userloginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title w-100 text-center text-white" id="userloginModalLabel">User Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('buyer.login.submit') }}" method="POST">
            @csrf
            <div class="container">
              <div class="row">
                <div class="col-md-12 mt-3">
                  <h6>Email:</h6>
                  <input class="form-control" type="email" name="email" id="userloginemail"
                    placeholder="example@gmail.com">
                </div>
                <div class="col-md-12 mt-3">
                  <h6>Password:</h6>
                  <input class="form-control" type="password" name="password" id="userloginpassword"
                    placeholder="Enter Password...">
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-end mt-3">
                <button type="cancel" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
          </form>
        </div>
        <hr>
        <h6 class="text-center pb-3">Don't Have an Account? <a class="btn text-primary" data-bs-toggle="modal"
            data-bs-dismiss="modal" data-bs-target="#usersignupmodal">Click Here</a> To Create New One</h6>
      </div>
    </div>
  </div>
  </div>
  <!--Buyer login Modal ends Here  -->


  <!--Buyer Signup Start Here Modal -->
  <div class="modal fade" id="usersignupmodal" tabindex="-1" aria-labelledby="usersignupmodal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title w-100 text-center text-white" id="usersignupmodal">Create New User Account
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('buyer.register') }}" method="POST">
            @csrf
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h6>Name:</h6>
                  <input class="form-control" type="text" name="name" id="username" placeholder="Enter Name...">
                </div>
                <div class="col-md-12 mt-3">
                  <h6>Email:</h6>
                  <input class="form-control" type="email" name="email" id="useremail" placeholder="example@gmail.com">
                </div>
                <div class="col-md-12 mt-3">
                  <h6>Password:</h6>
                  <input class="form-control" type="password" name="password" id="userpassword"
                    placeholder="choose strong password to make your account strong">
                </div>
                <div class="col-md-12 mt-3">
                  <h6>Confirm Password:</h6>
                  <input class="form-control" type="password" name="password_confirmation" id="userconfirm"
                    placeholder="Password and confirm password should match">
                </div>
                <div class="col-md-8 offset-md-2 text-center mt-3">
                  <p>By Clicking on Sign Up, you agreed with the <a href="#">Term & policy</a> of
                    CodeHub</p>
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-end mt-3">
                <button type="cancel" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Buyer Signup Ends Here Modal -->


  <!-- cart modal starts here -->
  <div class="modal fade" id="cartmodal" tabindex="-1" aria-labelledby="cartmodal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container mt-4 mb-2 text-center">
            <h4>${{ Cart::total() }}</h4>
            <div class="mt-4">
              <a href="{{ route('buyer.cart') }}" class="btn btn-info rounded-pill form-control text-white">View
                cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- cart modal ends here -->


  <!-- main section with search start here  -->
  @yield('header')
  <!-- main section with search ends here  -->



  <!-- body (product) section starts here  -->
  @yield('content')
  <!-- body (product) section ends here  -->



  <!-- subscribe section starts here -->
  <div class="container-fluid pt-5 pb-3" id="subscribe">
    <div class="row">
      <div class="col-md-3 mt-2 mb-2 text-center">
        <h6>Get Notifications for Discount offers!</h6>
      </div>
      <div class="col-md-6">
        <form action="{{ route('subscribers.store') }}" method="POST">
          @csrf
          <div class="input-group mb-2">
            <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
            <button class="input-group-text btn-success" type="submit">
              Subscribe Now
            </button>
          </div>
        </form>
      </div>
      <div class="col-md-3 text-center">
        <p>By clicking the button you agreed with <a href="#" style="text-decoration: none;">privacy policy</a>
          of CodeHub</p>
      </div>
    </div>
  </div>
  <!-- subscribe section ends here -->


  <!-- Footer section starts here -->
  <div class="container-fluid bg-dark p-4 text-white justify-content-sm-center justify-content-md-start" id="footer">
    <div class="container pt-3">
      <div class="row">
        <div class="col-lg-3 col-sm-6 mb-3">
          <h3>Categories</h3>
          <h6><a href="{{ route('projects.category',1) }}">WordPress themes</a></h6>
          <h6><a href="{{ route('projects.category',2) }}">Html</a></h6>
          <h6><a href="{{ route('projects.category',3) }}">Android Apps</a></h6>
          <h6><a href="{{ route('projects.category',4) }}">IOS Apps</a></h6>
          <h6><a href="{{ route('projects.category',5) }}">Games</a></h6>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
          <h3>Sub-Categories</h3>
          <h6><a href="">Business</a></h6>
          <h6><a href="">Portfolio</a></h6>
          <h6><a href="">Ecommerce</a></h6>
          <h6><a href="">Company</a></h6>
          <h6><a href="">Blogs</a></h6>
          <h6><a href="">Sports</a></h6>
          <h6><a href="">Trivia & Quiz</a></h6>
          <h6><a href="">News & Magzine</a></h6>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
          <h3>Contact</h3>
          <h6><a href="https://www.facebook.com/kamal.shakoor.54/" target="_blank">Facebook</a></h6>
          <h6><a href="https://www.linkedin.com/in/kamal-shakoor/" target="_blank">LinkedIn</a></h6>
          <h6><a href="" target="_blank">Instagram</a></h6>
          <h6><a href="https://www.quora.com/profile/Kamal-Shakoor-5" target="_blank">Quora</a></h6>
          <h6><a href="" type="submit" data-bs-toggle="modal" data-bs-target="#supportModal">Fill
              Complaint</a></h6>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
          <h3>
            CodeHub
          </h3>
          <span class="ml-5">CodeHub is a marketplace where you can buy everything you need to create a
            website/App. Hundreds of independent developers sell their products here so that you could
            create your own unique project. if you don't like existing Templates then request CodeHub
            developers to develop you product according to your requirements by <a href="" id="request"
              class="text-danger" type="submit" data-bs-toggle="modal" data-bs-target="#requestModal">Clicking
              Here</a></span>
        </div>
      </div>




      <!-- request project Modal start here -->
      <div class="modal fade text-dark" id="requestModal" tabindex="-1" aria-labelledby="requestModal"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title w-100 text-center text-dark " id="requestModal">Request for custom
                Project</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('customprojects.store') }}" method="POST">
                @csrf
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h6>Name:</h6>
                      <input class="form-control mb-3" type="text" name="name" id="name" placeholder="Enter Name..."
                        required>
                    </div>
                    <div class="col-md-12">
                      <h6>Email:</h6>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email..."
                        required>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                      <h6>WhatsApp No:</h6>
                      <input class="form-control" type="text" name="number" id="number"
                        placeholder="Write your number with country code" required>
                    </div>
                    <div class="col-md-12 mt-3">
                      <textarea class="form-control" name="message"
                        placeholder="Short description about project that you want.....?" id="message" rows="5"
                        required></textarea>
                    </div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Send Custom Request</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- request project Modal ends here -->



      <!-- Complaint related to Project/Seller Modal start here -->
      <div class="modal fade text-dark" id="supportModal" tabindex="-1" aria-labelledby="supportModal"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title w-100 text-center text-dark " id="supportModal">Fill complaint about
                project/Seller</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('complaints.store') }}" method="POST">
                @csrf
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h6>Seller Name:</h6>
                      <input class="form-control mb-3" type="text" name="seller_name" id="seller_name"
                        placeholder="Enter Seller Name..." required>
                    </div>
                    <div class="col-md-12">
                      <h6>Project Title:</h6>
                      <input class="form-control" type="text" name="project_title" id="project_title"
                        placeholder="Enter Project Title..." required>
                    </div>
                    <div class="col-md-12 mt-3 mb-3">
                      <h6>WhatsApp No:</h6>
                      <input class="form-control" type="text" name="number" id="number"
                        placeholder="Write your number with country code" required>
                    </div>
                    <div class="col-md-12 mt-3">
                      <textarea class="form-control" name="message"
                        placeholder="what issue you are facing right now.....?" id="message" rows="5"
                        required></textarea>
                    </div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Send Complaint</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Complaint related to Project/Seller Modal ends here -->

      <hr>
      <div class="row text-center">
        <div class="col-md-12">
          Copyright © 2022-2025 CodeHub. All rights reserved.
        </div>
      </div>
    </div>
  </div>
  <!-- Footer section Ends here -->

  <!-- script for Languages translator -->
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
  </script>

  <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
  </script>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

  {{-- Sweet Alert Js --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    @if (session()->has('success'))
    swal('{{ session()->get('success') }}',{icon:'success'})
    @endif
    @if (session()->has('error'))
    swal('{{ session()->get('error') }}')
    @endif
  </script>
  @yield('js')
</body>

</html>