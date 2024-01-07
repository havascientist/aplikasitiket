{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

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
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <!-- Content -->
    <div class="bg d-flex justify-content-between"> {{-- ini background --}}

        {{-- Ini logo --}}
        <div class="d-flex justify-content-start p-4 mx-2">
            <img src="img/Logo.png" alt="image" width="100" height="50">
        </div>

        {{-- Ini form --}}
        <div class="d-flex justify-content-end h-100">
            <div class="w-30 p-5 rounded shadow-sm" style="background-color: #ffffff;">
                <div class="mb-3 mt-5 text-center" style="font-weight: bold; font-size: 2em;">
                    Login to Your account
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <!-- Email Address -->
                    <div class="mb-3 mx-5">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control form-control-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
        
                    <!-- Password -->
                    <div class="mb-3 mx-5">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" class="form-control form-control-sm" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
        
                    <div class="d-flex justify-content-between mx-5">
                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                    </div>
    
                    <!-- Forget PW -->
                    {{-- <div class="mb-3 form-check">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                        @endif
                    </div> --}}
                    </div>

                    <div class="d-grid gap-2 mx-5 mt-3">
                        <button class="btn btn-primary btn-sm fw-bold" type="submit" style="background: #C90022">{{ __('Log in') }}</button>
                    </div>

                    <div class="text-center mt-2">Don't have an account? <a href="/register" class="text-decoration-none">Register</a></div>
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
