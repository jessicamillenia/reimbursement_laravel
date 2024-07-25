<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

      .link-sidebar {
          margin: 10px;
      }

      a {
        color: white;
        text-decoration: none;
      }

      a:hover {
        color: white;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          @if (Auth::guard('web')->user()->jabatan == 'Direktur')
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(1) === 'account' ? 'active' : '' }}" href="{{route('account.index')}}">
                <i class="bi bi-people feather"></i>
                <span class="link-sidebar">ACCOUNTS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(1) === 'manageReimburse' ? 'active' : '' }}" href="{{route('managereimburse')}}">
                <i class="bi bi-book"></i>
                <span class="link-sidebar">MANAGE REIMBURSE</span>
            </a>
          </li>
          @endif
          @if (Auth::guard('web')->user()->jabatan == 'Finance')
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(1) === 'manageReimburse' ? 'active' : '' }}" href="{{route('managereimburse')}}">
                <i class="bi bi-people feather"></i>
                <span class="link-sidebar">MANAGE REIMBURSE</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link  {{ Request::segment(1) === 'reimbursement' ? 'active' : '' }}" href="{{route('reimburse.index')}}">
                <i class="bi bi-file-earmark-text"></i>
                <span class="link-sidebar">REIMBURSEMENT</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('title')</h1>
      </div>
      <!-- The Modal -->
      @yield('content')
    </main>
  </div>
</div>

{{-- <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> --}}
<script>
    function fileValidation(){
      var input, file;
      input = document.getElementById('photo');
      file = input.files[0];
  
      var fileInput = document.getElementById('photo');
      var filePath = fileInput.value;
      let img = new Image()
        img.src = window.URL.createObjectURL(event.target.files[0])
        img.onload = () => {
          if(img.width!=img.height) {
          alert('Your image is not 1:1 or not square!');

          fileInput.value = "";
          return false;
        }
      }
      var allowedExtensions = /(\.jpg)$/i;
      var allowedExtensions2 = /(\.png)$/i;
      var allowedExtensions3 = /(\.jpeg)$/i;
      if(!allowedExtensions.exec(filePath) && !allowedExtensions2.exec(filePath) && !allowedExtensions3.exec(filePath)){
          alert('Silahkan upload berkas yang berekstensi jpg atau png!');
  
          fileInput.value = "";
          return false;
      } else if(file.size > 1048576){
          alert('Silahkan upload berkas maksimal 1MB!');
  
          fileInput.value = "";
          return false;
      } else if(imgWidth!=imgHeight) {
          alert('Your image is not 1:1 or not square!' + imgHeight + " " + imgWidth);

          fileInput.value = "";
          return false;
      }
    }
</script>
@yield('script')
</body>
</html>