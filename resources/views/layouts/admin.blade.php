<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('build/assets/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tambahkan link CSS DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Register</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-light" style="background-color: #ffff;">        
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/Logo.png') }}" alt="" width="100" height="50">

            </a>
            <div class="d-flex gap-4">
                @auth
                <div class="dropdown">
                    <button class="btn dropdown-toggle bg-dark   text-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>                
                @else
                    <a class="nav-link" href="{{ route('login') }}" style="color: black;">Login</a>
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}" style="color: black;">Register</a>
                    @endif
                @endauth
            </div>            
        </div>
    </nav>
    <!-- End Header -->

    <div class="bg">
        @yield('container')
    </div>

    <!-- End Content -->

    <!-- footer -->
    <footer class="text-center py-3" style="background-color: #C90022;">
        <div class="container">
          <span style="color: white;">Made in Indonesia</span>
        </div>
        
    </footer>
    <!-- End Footer-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        let selectedSeat = null;
    const seats = document.querySelectorAll('.seat');
    seats.forEach(seat => {
      seat.addEventListener('click', () => {
        if (selectedSeat) {
          selectedSeat.classList.remove('selected');
        }
        seat.classList.add('selected');
        selectedSeat = seat;
      });
    });
    </script>
</body>

</html>