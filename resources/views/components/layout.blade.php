<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Position</title>
    @Vite('resources/js/app.js')
</head>
<body class="bg-black text-white">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="{{route("jobs.index")}}">
                    <img src="{{ Vite::asset('resources/images/logo.svg')}}" alt="">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="">Jobs</a>
                <a href="">Careers</a>
                <a href="">Salaries</a>
                <a href="">Company</a>
            </div>
            @auth
                <div class="font-bold space-x-3">
                    <a href="{{route("jobs.create")}}">Post a Job</a>
                    <a href="{{route("login.destroy")}}">Logout</a>
                </div>
            @endauth
            @guest
            <div class="space-x-6 font-bold">
                <a href="{{route("register.create")}}">Sign Up</a>
                <a href="{{route("login.create")}}">Login</a>
            </div>
            @endguest
        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            {{$slot}}
        </main>
    </div>
</body>
</html>