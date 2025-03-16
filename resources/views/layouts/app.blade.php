<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Matrícula')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <div class="min-h-screen bg-gray-100">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">

                        <title>@yield('title', 'Matrícula')</title>

                        @if($title)
                        <h1 class="text-3xl font-bold text-gray-800">
                            {{ $title }}
                        </h1>
                        @endif
                    </div>

                    @if($errors->any())
                    <div class="bg-red-100 text-red-800 border border-red-300 rounded p-4 mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li class="mb-1">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="bg-red-100 text-red-800 border border-red-300 rounded p-4 mb-4">
                        {{ session('error') }}
                    </div>
                    @endif


                    @if(session('success'))
                    <div class="alert alert-success mb-4 p-4 bg-green-200 border border-green-500 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                    @endif

                    <main class="px-4 py-5 sm:px-6">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>