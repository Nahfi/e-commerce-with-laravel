

@extends("layout.custom")

@section("content")
    <div class="account-page">
        <div class="container">
            @if (session()->has("error"))
            <div class="alert alert-warning">
                {{  session()->get('error') }}
                </div>

            @endif
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('images/image1.png')}}" width="50%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="register()">Register</span>
                            <span onclick="login()">Login</span>
                            <hr id="Indicator">
                        </div>
                        <form   id="LoginForm" action="/user" method="get">
                            @csrf
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="pass" placeholder="Password">
                            <button type="submit" class="btn">Login</button>
                            <a href="{{ url("/send_mail") }}">Forget Password</a>
                        </form>

                        <form  id="RegForm" action="/user" method="POST">
                       @csrf
                            <input type="text" name="uname" placeholder="Username" required>
                            <input type="email" name="mail" placeholder="Email">
                            <input type="text" name="mobile" placeholder="Mobile">
                            <input type="password" name="pass" placeholder="Password" required>
                            <button type="submit" name="reg" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



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

    <!-- Toggle Form -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
        function register() {
            RegForm.style.transform = "translatex(300px)";
            LoginForm.style.transform = "translatex(300px)";
            Indicator.style.transform = "translateX(0px)";

        }
        function login() {
            RegForm.style.transform = "translatex(0px)";
            LoginForm.style.transform = "translatex(0px)";
            Indicator.style.transform = "translate(100px)";

        }
    </script>

@endsection
