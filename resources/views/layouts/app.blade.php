<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Apotek Sehat')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-blue-600 min-h-screen">
<section class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Main Content --}}
    <main class="flex-1 p-6 bg-blue-600 flex flex-col gap-6">
        {{-- Topbar --}}
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">@yield('page-title')</h1>
            <div class="flex items-center gap-2 text-white">
                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                <span>Admin</span>
            </div>
        </div>

        {{-- Page Content --}}
        @yield('content')
    </main>
</section>

{{-- JS --}}
@stack('scripts')
</body>
</html>
