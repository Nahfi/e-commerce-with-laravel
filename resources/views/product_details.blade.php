
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf_token" content="{{ csrf_token() }}">

    <title>All Products | RedStore</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{ url('/') }}"><img src= "{{ asset('images/logo.png') }}" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/products') }}">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="{{ url('/account') }}">Account</a></li>
                </ul>
            </nav>
            <a href="{{ url('/cart') }}"><img src= "{{ asset('images/cart.png') }}" width="30px" height="30px"></a>
            <img src= "{{ asset('images/menu.png') }}" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="row">
            <div class="col-2">
                <h1>Give Your Workout <br> A New Style!</h1>
                <p>Success isn't always about greatness. It;s about consistency. Consistent <br> hard work gains
                    success. Greatness will come.</p>
                <a href="" class="btn">Explore Now &#8594;</a>
            </div>
            <div class="col-2">
                <img src= "{{ asset('images/image1.png') }}">
            </div>
        </div>
    </div>
</div>


    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <div class="error">

                </div>
                <img src="{{ asset($image[0])}}" width="100%" id="ProductImg">

                <div class="small-img-row">
                     @foreach ($image as $im )
                     <div class="small-img-col">
                        <img src="{{ asset($im)}}" width="100%" class="small-img">
                    </div>
                     @endforeach

                </div>

            </div>
            <div class="col-2">
                <p>{{  $product->find($product->id)->oneto->first()->catagories}}</p>
        <h1>{{ $product->name }}</h1>

        <label for="">price</label>
                <h4>{{ $product->price }}</h4>
                <form action="/add_cart" method="post">
                    @csrf
                <select name="size">
                    <option value="">Select Size</option>
                    <option  value="XXL">XXL</option>
                    <option value="XL">XL</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="S">S</option>
                </select>
                <label for="">Amount</label>
                <input type="text" value="1" name="amount" id="qt" onkeyup="validate_amount(this.value,{{ $product->id }})"  >
                {{-- <a href="" class="btn">Add To Cart</a>
                 --}}
                 <input type="hidden" name="p_id" value="{{ $product->id }}">
                 <input type="hidden" name="price" value="{{ $product->price }}">
                 <input type="hidden" name="p_name" value="{{ $product->name }}">
                     <button type="submit" class="btn">Add To Cart</button>
                    </form>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p>{{ $product->details }}.</p>
            </div>
        </div>
    </div>
    <!-- title -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p><a href="{{ url("/products") }}">view more</a></p>
        </div>
    </div>
    <!-- Products -->
    <div class="small-container">
        <div class="row">
            @foreach ($rlt as $fetch )
          <div class="col-xs-4" style="padding: 10px">
            <a href="{{ url("/products/".$fetch->id) }}"><img src="{{ asset(explode('|',$fetch->image )[0])}}"  alt="product_image" style="height:200px; width:180px ; margin-bottom:10px">
            </a>
              <h4>{{ $fetch->name }}</h4>
              <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
              </div>
              <p>{{ $fetch->price }}</p>
          </div>

            @endforeach
        </div>
    </div>


    <!-- javascript -->

<script src="{{ url('/js/script.js') }}"></script>
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- product gallery -->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function () {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function () {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function () {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function () {
            ProductImg.src = SmallImg[3].src;
        }

    </script>



<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>Download App for Android and ios mobile phone.</p>
                <div class="app-logo">
                    <img src="{{ asset('images/play-store.png')}}">
                    <img src="{{ asset('images/app-store.png')}}">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="{{ asset('images/logo-white.png')}}">
                <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.
                </p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2021 - Nafiz khan</p>
    </div>
</div>
</body>
</html>
