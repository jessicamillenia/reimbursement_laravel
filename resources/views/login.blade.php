<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="{{ route('checkLogin') }}" method="POST">
    {{ csrf_field() }}
    <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>
    <label class="visually-hidden">Nip</label>
    <input type="text" name="nip" class="form-control" placeholder="Nip" value="{{ old('nip') }}" required autofocus>
    <label class="visually-hidden">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
    @if(!empty(session('notif')))
    <p id="notif" style="color: red;">{{ session('notif') }}</p>
    {{ session(['notif' => '']) }}
    @endif
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>


    
  </body>
</html>