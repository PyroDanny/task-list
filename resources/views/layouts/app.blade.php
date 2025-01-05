<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 task list</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/20 hover:bg-slate-100 text-slate-700;
        }

        .link{
            @apply font-medium text-gray-700 underline decoration-green-500;
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')
</head>
<body class="container mx-auto my-10 max-w-lg">
    <h1 class="text-2xl">@yield('title')</h1>
    <div>
        @if (session()->has('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif
       @yield('content')
    </div>
</body>
</html>