<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    <section class="h-screen bg-cover">
        <div class="flex h-full  items-center justify-center mx-auto bg-gradient-to-r from-indigo-600">
            <div class="max-w-2xl text-center">
                <h1 class="text-3xl sm:text-5xl capitalize tracking-widest text-white lg:text-5xl">
                    Book your flight now!
                </h1>

                <div class="flex flex-col space-y-3">
                    <div id="register" class="@if ($errors->loginForm->has('email') or $errors->loginForm->has('password')) hidden @endif">
                        @include('auth.register')
                        <button class="text-white" onclick="hideRegisterShowLogin()">Already have an account?
                            Login</button>
                    </div>
                    <div class="py-4">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div id="login" class="@if ($errors->loginForm->has('email') or $errors->loginForm->has('password')) visible @else hidden @endif">
                        @include('auth.login') <br>
                        <button class="text-white" onclick="showRegisterHideLogin()">Not have an account?
                            Register</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    function hideRegisterShowLogin() {
        document.getElementById('register').classList.add("hidden");
        document.getElementById("login").classList.remove("hidden");
    }

    function showRegisterHideLogin() {
        document.getElementById('register').classList.remove("hidden");
        document.getElementById("login").classList.add("hidden");
    }
</script>

</html>
