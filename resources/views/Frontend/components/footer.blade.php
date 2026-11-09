
<footer class="relative overflow-hidden bg-[#071B3A] text-white">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -right-40 -top-40 h-96 w-96 rounded-full bg-blue-500/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-sky-500/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 pt-16 lg:px-8 lg:pt-20">

        {{-- TOP FOOTER --}}
        <div class="grid gap-12 pb-14 md:grid-cols-2 lg:grid-cols-4 lg:gap-10">

            {{-- COMPANY INFORMATION --}}
            <div class="lg:col-span-1">

                <a href="#home" class="inline-block">

                    <img
                        src="{{ asset('images/logo-accu.png') }}"
                        alt="Logo ACCU"
                        class="h-20 w-auto max-w-[220px] object-contain"
                    >

                </a>

                <p class="mt-6 max-w-sm text-sm leading-7 text-blue-100/70">
                    PT. Abhinaya Citra Cakra Utama merupakan perusahaan yang bergerak di bidang pengadaan barang dan penyedia jasa tenaga kerja profesional untuk mendukung kebutuhan operasional bisnis Anda.
                </p>

                <div class="mt-6">

                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-sky-400">
                        Our Tagline
                    </p>

                    <p class="mt-2 text-lg font-bold italic text-white">
                        Your Facility Service Solution.
                    </p>

                </div>

            </div>


            {{-- QUICK LINKS --}}
            <div>
                <h3 class="text-lg font-bold text-white">
                    Quick Links
                </h3>

                <div class="mt-4 h-1 w-12 rounded-full bg-cyan-400"></div>
                <ul class="mt-8 space-y-5">
                    @foreach($menus as $menu)
                        <li>
                            <a href="#{{ $menu->anchor }}"
                            class="flex items-center gap-3 text-slate-300 transition hover:text-cyan-400">

                                <span class="text-cyan-400">•</span>

                                {{ $menu->label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            {{-- OUR SERVICES --}}
            <div>
                <h3 class="text-lg font-extrabold text-white">
                    Our Services
                </h3>

                <div class="mt-3 h-1 w-10 rounded-full bg-sky-400"></div>

                <ul class="mt-7 space-y-4 text-sm">
                    @foreach($services as $service)
                        <li>
                            <a href="#services"
                            class="text-slate-300 transition hover:text-cyan-400">
                                {{ $service->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            {{-- CONTACT INFORMATION --}}
            <div>
                <h3 class="text-lg font-extrabold text-white">
                    Contact Us
                </h3>

                <div class="mt-3 h-1 w-10 rounded-full bg-sky-400"></div>

                <div class="mt-7 space-y-6">
                    {{-- Phone / WhatsApp --}}
                    @if($contact?->phone || $contact?->whatsapp)
                        @php
                            $whatsappNumber = preg_replace('/\D/', '', $contact->whatsapp ?? $contact->phone);
                            $phoneNumber = preg_replace('/[^0-9+]/', '', $contact->phone ?? $contact->whatsapp);
                        @endphp

                        <a href="{{ $whatsappNumber ? 'https://wa.me/' . $whatsappNumber : 'tel:' . $phoneNumber }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-start gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-800/70 text-sky-300 transition group-hover:bg-blue-600">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 2.9a2 2 0 0 1-.5 2.1L8 10a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.9.6 2.9.7a2 2 0 0 1 1.7 2Z"/>
                                </svg>
                            </div>

                            <div>
                                <p class="text-sm font-bold text-white">
                                    Phone / WhatsApp
                                </p>

                                <p class="mt-1 text-sm text-blue-100/70">
                                    {{ $contact->phone ?? $contact->whatsapp }}
                                </p>
                            </div>
                        </a>
                    @endif


                    {{-- Email --}}
                    @if($contact?->email)
                        <a href="mailto:{{ $contact->email }}"
                            class="group flex items-start gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-800/70 text-sky-300 transition group-hover:bg-blue-600">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="m22 7-10 7L2 7"/>
                                </svg>
                            </div>

                            <div>
                                <p class="text-sm font-bold text-white">
                                    Email
                                </p>

                                <p class="mt-1 break-all text-sm text-blue-100/70">
                                    {{ $contact->email }}
                                </p>
                            </div>
                        </a>
                    @endif


                    {{-- Address --}}
                    @if($contact?->address)
                        <a href="{{ $contact->maps_url ?: '#' }}"
                            @if($contact->maps_url)
                                target="_blank"
                                rel="noopener noreferrer"
                            @endif
                            class="group flex items-start gap-4">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-800/70 text-sky-300 transition group-hover:bg-blue-600">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="2.5"/>
                                </svg>
                            </div>

                            <div>
                                <p class="text-sm font-bold text-white">
                                    Office Address
                                </p>

                                <p class="mt-1 text-sm leading-6 text-blue-100/70">
                                    {{ $contact->address }}
                                </p>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- BOTTOM FOOTER --}}
        <div class="border-t border-white/10 py-7">
            <div class="flex flex-col items-center justify-between gap-4 text-center sm:flex-row sm:text-left">
                <p class="text-xs leading-6 text-blue-100/60">
                    © {{ date('Y') }} <span class="font-bold text-white">PT. Abhinaya Citra Cakra Utama.</span>
                </p>

                <a href="#home"
                    class="inline-flex items-center gap-2 text-xs font-semibold text-blue-100/70 transition hover:text-white">

                    Back to Top

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m18 15-6-6-6 6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</footer>
