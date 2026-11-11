
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} - ACCU CMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>

    <<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-slate-100 text-slate-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen">

        {{-- Mobile Overlay --}}
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-slate-900/50 lg:hidden"
            style="display: none;">
        </div>

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Main Content --}}
        <div class="min-h-screen lg:pl-72">

            {{-- Topbar --}}
            <header class="sticky top-0 z-30 flex h-16 items-center justify-between
                           border-b border-slate-200 bg-white px-4 sm:px-6 lg:px-8">

                <div class="flex items-center gap-3">
                    <button
                        @click="sidebarOpen = true"
                        class="rounded-lg p-2 text-slate-600 hover:bg-slate-100 lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <div>
                        <h1 class="text-lg font-semibold text-slate-800">
                            {{ $title ?? 'Dashboard' }}
                        </h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-semibold text-slate-700">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-xs text-slate-500">
                            {{ auth()->user()->role === 'super_admin'
                                ? 'Super Admin'
                                : 'Admin' }}
                        </p>
                    </div>

                    <div class="flex h-9 w-9 items-center justify-center
                                rounded-full bg-blue-100 font-semibold text-blue-700">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>

            </header>

            {{-- Page Content --}}
            <main class="p-4 sm:p-6 lg:p-8">
                @if (session('success'))
                    <div class="mb-6 rounded-lg border border-green-200
                                bg-green-50 px-4 py-3 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                {{ $slot ?? '' }}

                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>
