<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

    <title>Document</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-black-main text-gray-900 dark:text-white font-hanken-grotesk pb-14">
<div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/20">
        <div>
            <a href="{{route('home')}}">
                <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="">
            </a>
        </div>

        <div class="space-x-6 font-bold">
            <a href="/jobs">Jobs</a>
            <a href="#">Careers</a>
            <a href="#">Salaries</a>
            <a href="#">Companies</a>

        </div>
        @auth
            <div class="flex gap-4">
                <a href="/jobs/create">Post a Job</a>

                <form method="POST" action="/logout" >
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer">Log Out</button>
                </form>
            </div>


        @endauth

        @guest
            <div class="space-x-5 font-bold">
                <a href="/login">Log In</a>
                <a href="/register">Register</a>
            </div>
        @endguest
    </nav>


    <main class="mt-10 max-w-[986px] mx-auto">
        {{$slot}}
    </main>
</div>

</body>
</html>
