<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<div class="m-5">
    <h1 class="text-3xl font-bold underline mb-5">
        Hello world from Tailwind CSS!
    </h1>
    <nav class="mt-5 mb-5">
        <ul class="flex flex-row items-center gap-4">
            <li><a href="{{ route('main.index') }}">Main page</a></li>
            <li><a href="{{ route('admin.post.index') }}">Admin panel page</a></li>
            <li><a href="{{ route('post.index') }}">Posts page</a></li>
            <li><a href="{{ route('contact.index') }}">Contacts page</a></li>
            <li><a href="{{ route('about.index') }}">About page</a></li>
        </ul>
    </nav>
    @yield('content')
</div>
</body>
</html>
