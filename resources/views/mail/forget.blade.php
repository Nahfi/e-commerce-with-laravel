<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url("/css/style.css") }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-6 justify-content-center  text-center">
            <div class="aleart">
                @if (session()->has('error'))
                  {{ session()->get('error') }}


                @endif
            </div>

    <form   id="LoginForm" action="/api/ send_mail" method="get">
        @csrf
        <input type="email" name="email" placeholder="Email">

        <button type="submit" class="btn">Submit</button>

    </form>


   <h2>{{ $mail}}</h2>



        </div>
    </div>
</div>




</body>
</html>
