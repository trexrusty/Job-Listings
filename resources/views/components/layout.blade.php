@props(['title_head' => 'FLP Tech'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$title_head}}</title>
</head>
<body class="bg-black pb-10">

    <div class="px-10 bg-black text-white">
        <nav class="flex justify-between items-center py-4 border-b border-white/20">
            <div>
                <a href="/">Main</a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="">Jobs</a>
                <a href="">Companys</a>
                <a href="">Salarys</a>
            </div>
            @auth
            <div class="space-x-6 font-bold flex">
                <a href="/jobs/create">Post a Job</a>

                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')

                    <button class="hover:text-red-600">Log Out</button>
                </form>
            </div>
            @endauth
            @guest()
            <div>
                <a href="/register" class="mr-4 font-bold">Sign Up</a>
                <a href="/login" class="mr-4 font-bold">login</a>
            </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{$slot}}
        </main>
    </div>


</body>
</html>
