
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO: Title --}}
    <title>@yield('title', ($siteSetting?->company_name ?? 'ACCU') . ' - Cleaning Service Solutions')</title>

    {{-- SEO: Description --}}
    <meta name="description"
        content="@yield('meta_description', $siteSetting?->company_description ?? 'PT Abhinaya Citra Cakra Utama menyediakan solusi cleaning service dan facility management profesional.')">

    {{-- SEO: Keywords --}}
    <meta name="keywords"
        content="@yield('meta_keywords', 'ACCU, cleaning service, facility management, cleaning service Indonesia, PT Abhinaya Citra Cakra Utama')">

    <meta name="author" content="{{ $siteSetting?->company_name ?? 'PT Abhinaya Citra Cakra Utama' }}">

    {{-- SEO: Robots --}}
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">

    {{-- SEO: Canonical --}}
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="{{ $siteSetting?->company_name ?? 'ACCU' }}">
    <meta property="og:title" content="@yield('title', 'ACCU - Cleaning Service Solutions')">
    <meta property="og:description"
        content="@yield('meta_description', $siteSetting?->company_description ?? 'Solusi cleaning service dan facility management profesional.')">
    <meta property="og:url" content="{{ url()->current() }}">

    @if ($siteSetting?->logo)
        <meta property="og:image" content="{{ asset('storage/' . $siteSetting->logo) }}">
    @else
        <meta property="og:image" content="{{ asset('images/accu-logo.png') }}">
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'ACCU - Cleaning Service Solutions')">
    <meta name="twitter:description"
        content="@yield('meta_description', $siteSetting?->company_description ?? 'Solusi cleaning service dan facility management profesional.')">

    @if ($siteSetting?->logo)
        <meta name="twitter:image" content="{{ asset('storage/' . $siteSetting->logo) }}">
    @else
        <meta name="twitter:image" content="{{ asset('images/accu-logo.png') }}">
    @endif

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Lucide --}}
    <script defer src="https://unpkg.com/lucide@latest"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();
        });
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-sans antialiased text-slate-800">

    @include('frontend.components.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.components.footer')

    @stack('scripts')

</body>
</html>
