
<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col
           border-r border-slate-800 bg-slate-950 text-white
           transition-transform duration-300 lg:translate-x-0">

    {{-- Logo --}}
    <div class="flex h-16 items-center justify-between border-b border-slate-800 px-6">
        <div class="flex items-center gap-3">
            <img
                src="{{ asset('images/accu-logo.png') }}"
                alt="Logo ACCU"
                class="h-10 w-auto object-contain"
            >

            <div>
                <p class="text-sm font-semibold text-white">
                    ACCU CMS
                </p>
                <p class="text-xs text-slate-400">
                    Admin Panel
                </p>
            </div>
        </div>

        <button @click="sidebarOpen = false"
            class="rounded-lg p-2 text-slate-400 hover:bg-slate-800 lg:hidden">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 space-y-6 overflow-y-auto px-4 py-6">

        <div>
            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                Main Menu
            </p>

            <a href="{{ route('dashboard') }}"
                class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm
                {{ request()->routeIs('dashboard')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-300 hover:bg-slate-800' }}">
                <span>▦</span>
                Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition
                {{ request()->routeIs('admin.users.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-300 hover:bg-slate-800' }}">
                <i class="fa fa-user-plus mr-2"></i>
                Users
            </a>

            <a href="{{ route('admin.menus.index') }}"
                class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition
                {{ request()->routeIs('admin.menus.*')
                    ? 'bg-blue-600 text-white'
                    : 'text-slate-300 hover:bg-slate-800' }}">
                <i class="fa fa-cogs mr-2"></i>
                Menus
            </a>
        </div>

        <div>
            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                Website Management
            </p>

            @php
                $menus = [
                    [
                        'name' => 'Hero Section',
                        'route' => 'admin.hero.edit',
                        'icon' => 'fa-picture-o',
                    ],
                    [
                        'name' => 'About Section',
                        'route' => 'admin.about.edit',
                        'icon' => 'fa-info-circle',
                    ],
                    [
                        'name' => 'Visi & Misi',
                        'route' => 'admin.vision-mission.edit',
                        'icon' => 'fa-bullseye',
                    ],
                    [
                        'name' => 'Company Values',
                        'route' => 'admin.our-values.edit',
                        'icon' => 'fa-star',
                    ],
                    [
                        'name' => 'Services',
                        'route' => 'admin.services.edit',
                        'icon' => 'fa-briefcase',
                    ],
                    [
                        'name' => 'Facilities',
                        'route' => 'admin.operational-facilities.edit',
                        'icon' => 'fa-building',
                    ],
                    [
                        'name' => 'Clients',
                        'route' => 'admin.clients.edit',
                        'icon' => 'fa-handshake-o',
                    ],
                    [
                        'name' => 'Gallery',
                        'route' => 'admin.galleries.edit',
                        'icon' => 'fa-picture-o',
                    ],
                    [
                        'name' => 'Contact Us',
                        'route' => 'admin.contact-settings.edit',
                        'icon' => 'fa-phone',
                    ],
                    [
                        'name' => 'Career',
                        'route' => 'admin.career-positions.index',
                        'icon' => 'fa-briefcase',
                    ],
                ];
            @endphp

            @foreach ($menus as $menu)
                <a href="{{ route($menu['route']) }}"
                    class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition
                    {{ request()->routeIs($menu['route'])
                        ? 'bg-blue-600 text-white'
                        : 'text-slate-300 hover:bg-slate-800' }}">

                    <i class="fa {{ $menu['icon'] }} w-5 text-center text-base"></i>

                    {{ $menu['name'] }}
                </a>
            @endforeach

        </div>

    </nav>

    {{-- User / Logout --}}
    <div class="border-t border-slate-800 p-4">
        <div class="mb-3 px-2">
            <p class="truncate text-sm font-semibold">
                {{ auth()->user()->name }}
            </p>
            <p class="text-xs text-slate-400">
                {{ auth()->user()->email }}
            </p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5
                        text-sm text-red-400 hover:bg-slate-800">

                <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                Logout
            </button>
        </form>
    </div>

</aside>
