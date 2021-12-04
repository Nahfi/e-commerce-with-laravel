
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
