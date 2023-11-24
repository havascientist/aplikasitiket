

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('build/assets/css/loginRegis.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    

    <!-- Content -->
    <div class="bg d-flex justify-content-between">

        {{-- Ini logo --}}
        <div class="d-flex justify-content-start p-4 mx-2">
            <img src="img/Logo.png" alt="image" width="100" height="50">
        </div>

        <div class="d-flex justify-content-end h-100">
            <div class="p-5 rounded shadow-sm" style="background-color: #ffffff;">
                <div class="mb-3 mt-3 text-center" style="font-weight: bold; font-size: 2em;">
                    Register Your account
                </div>
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary btn-sm fw-bold" type="submit" style="background: #C90022">{{ __('Register') }}</button>
                    </div>

                    <div class="text-center mt-2">Already register? <a href="/login">Login</a></div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- footer -->
    
    <!-- End Footer-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
