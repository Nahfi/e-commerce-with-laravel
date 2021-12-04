@extends("layout.custom")
@section('content')
<!-- Feadtued Categories -->

<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src= "{{ asset('images/category-1.jpg') }}" >
            </div>
            <div class="col-3">
                <img src="{{ asset('images/category-2.jpg') }}">
            </div>
            <div class="col-3">
                <img src="{{ asset('images/category-3.jpg') }}">
            </div>
        </div>
    </div>
</div>

<!-- Featured Products -->

<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        @foreach ($latest as $fetch )
        <div class="col-lg-6" style="padding: 10px">
          <a href="{{ url("/products/".$fetch->id) }}"><img src="{{ asset(explode('|',$fetch->image )[0])}}"  alt="product_image" style="height:300px; width:200px ; margin-bottom:10px"></a>
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
    <h2 class="title">Latest Products</h2>
    <div class="row">
        @foreach ($feat as $fetch )
        <div class="col-4" style="padding: 10px">
          <a href="{{ url("/products/".$fetch->id) }}"><img src="{{ asset(explode('|',$fetch->image )[0])}}"  alt="product_image" style="height:300px; width:200px ; margin-bottom:10px"></a>
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

<!-- Offer -->
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('images/exclusive.png') }}" class="offer-img">
            </div>
            <div class="col-2">
                <p>Exclusively Available on RedStore</p>
                <h1>Smart Band 4</h1>
                <small>The Mi Smart Band 4 fearures a 39.9%larger (than Mi Band 3) AMOLED color full-touch display
                    with adjustable brightness, so everything is clear as can be.<br></small>
                <a href="{{ url('/products') }}" class="btn">Buy Now &#8594;</a>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial -->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    industry's standard dummy text.</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <img src="{{ asset('images/user-1.png')}}">
                <h3>Sean Parker</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    industry's standard dummy text.</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <img src="{{ asset('images/user-2.png')}}">
                <h3>Mike Smith</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    industry's standard dummy text.</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <img src="{{ asset('images/user-3.png')}}">
                <h3>Mabel Joe</h3>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->

<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="{{ asset('images/logo-godrej.png')}}>
            </div>
            <div class="col-5">
                <img src="{{ asset('images/logo-oppo.png')}}">
            </div>
            <div class="col-5">
                <img src="{{ asset('images/logo-coca-cola.png')}}">
            </div>
            <div class="col-5">
                <img src="{{ asset('images/logo-paypal.png')}}">
            </div>
            <div class="col-5">
                <img src="{{ asset('images/logo-philips.png')}}">
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<!-- javascript -->

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
@endsection
