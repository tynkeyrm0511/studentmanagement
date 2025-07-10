<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="grid grid-cols-12 h-screen">
        <div class="col-span-2 text-white">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-10 bg-gray-100">
            @yield('content')
        </div>
    </div>
</body>
    @yield('script')
</html>