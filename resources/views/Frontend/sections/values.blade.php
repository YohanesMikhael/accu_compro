
<section id="values" class="relative overflow-hidden bg-white py-24 sm:py-28">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -left-40 top-20 h-96 w-96 rounded-full bg-blue-50 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-40 bottom-0 h-96 w-96 rounded-full bg-green-50/60 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- SECTION HEADER --}}
        <div class="mb-14 max-w-4xl">

            <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-accu-primary">
                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                Our Core Values
            </span>

            <h2 class="mt-6 text-4xl font-extrabold tracking-tight text-accu-dark sm:text-5xl lg:text-6xl">
                Our <span class="text-accu-primary">Values.</span>
            </h2>

            <div class="mt-5 h-1.5 w-24 rounded-full bg-gradient-to-r from-accu-primary to-sky-400"></div>

            <p class="mt-7 max-w-4xl text-base leading-8 text-slate-600 sm:text-lg">
                Nilai-nilai yang menjadi pedoman kami dalam setiap langkah,
                untuk memberikan layanan terbaik dan membangun masa depan
                yang lebih baik bersama pelanggan, tenaga kerja, dan seluruh
                pemangku kepentingan.
            </p>

        </div>

        {{-- VALUES GRID --}}
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-5">

            @forelse ($values as $index => $value)

                @php
                    $isGreen = $index % 2 === 1;

                    $cardClass = $isGreen
                        ? 'border-green-100 bg-gradient-to-b from-green-50/70 to-white hover:border-green-200 hover:shadow-green-900/10'
                        : 'border-slate-100 bg-gradient-to-b from-blue-50/70 to-white hover:border-blue-200 hover:shadow-blue-900/10';

                    $iconClass = $isGreen
                        ? 'border-green-200 bg-gradient-to-br from-green-500 to-green-800 shadow-green-900/20'
                        : 'border-blue-200 bg-gradient-to-br from-blue-500 to-blue-950 shadow-blue-900/20';

                    $dividerClass = $isGreen
                        ? 'bg-green-600'
                        : 'bg-blue-600';
                @endphp

                <div class="group flex flex-col rounded-3xl border {{ $cardClass }} p-6 text-center shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                    {{-- ICON --}}
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full border-[3px] {{ $iconClass }} text-white shadow-lg transition duration-300 group-hover:scale-110">
                        <i data-lucide="{{ $value->icon }}" class="h-14 w-14"></i>
                    </div>

                    {{-- TITLE --}}
                    <h3 class="mt-5 text-lg font-extrabold leading-tight text-accu-dark">
                        {{ $value->title }}
                    </h3>

                    {{-- SUBTITLE --}}
                    @if ($value->subtitle)
                        <p class="mt-1 text-sm italic text-slate-500">
                            {{ $value->subtitle }}
                        </p>
                    @endif

                    {{-- DIVIDER --}}
                    <div class="mx-auto my-5 h-1 w-10 rounded-full {{ $dividerClass }}"></div>

                    {{-- DESCRIPTION --}}
                    <p class="text-sm leading-6 text-slate-600">
                        {{ $value->description }}
                    </p>

                </div>

            @empty

                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 py-12 text-center">
                    <p class="text-sm text-slate-500">
                        Company Values belum tersedia.
                    </p>
                </div>

            @endforelse

        </div>

    </div>

</section>
