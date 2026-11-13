<div
    x-data="{
        showProductModal: false,
        selectedCategory: null,
        categories: @js($productCategories->keyBy('id')),

        openCatalog(id) {
            const category = this.categories[id];

            this.selectedCategory = category ?? {
                name: '',
                description: '',
                logo: null,
                products: []
            };

            this.showProductModal = true;
        }
    }"
>
    <section id="catalog" class="relative overflow-hidden bg-white py-24 sm:py-28">
        {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -right-40 top-20 h-96 w-96 rounded-full bg-blue-100/50 blur-3xl"></div>
    <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-sky-100/50 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- SECTION HEADER --}}
        <div class="mb-14 max-w-4xl">

            <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-accu-primary">

                <span class="h-2 w-2 rounded-full bg-green-500"></span>

                Our Products

            </span>

            <h2 class="mt-6 text-4xl font-extrabold tracking-tight text-accu-dark sm:text-5xl lg:text-6xl">

                Our <span class="text-accu-primary">Product.</span>

            </h2>

            <div class="mt-5 h-1.5 w-24 rounded-full bg-gradient-to-r from-accu-primary to-sky-400"></div>

            <p class="mt-7 max-w-4xl text-base leading-8 text-slate-600 sm:text-lg">

                ACCU menyediakan berbagai kebutuhan operasional pendukung yang berkualitas untuk memastikan layanan tenaga kerja dan cleaning service kami berjalan optimal, efisien, dan profesional.

            </p>

        </div>

        {{-- PRODUCT CATEGORY GRID --}}
        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 xl:grid-cols-4">

            @forelse ($productCategories as $category)

                <div class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10">

                    {{-- CARD HEADER --}}
                    <div class="relative flex min-h-[150px] flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white px-4 py-6 text-center">

                        <span class="absolute left-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-accu-primary text-lg font-extrabold text-white shadow-lg">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        @if ($category->logo)
                            <img
                                src="{{ asset('storage/' . $category->logo) }}"
                                alt="Logo {{ $category->name }}"
                                class="mb-3 h-14 w-14 object-contain"
                            >
                        @else
                            <div class="mb-3 flex h-14 w-14 items-center justify-center rounded-xl bg-blue-100 text-accu-primary">
                                <i class="fa fa-tags text-2xl"></i>
                            </div>
                        @endif

                        <h3 class="text-lg font-extrabold leading-tight text-accu-dark">
                            {{ $category->name }}
                        </h3>

                    </div>

                    {{-- CATEGORY IMAGE --}}
                    <div class="relative h-56 overflow-hidden bg-slate-100">

                        @if ($category->image)
                            <img
                                src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                            >
                        @else
                            <div class="flex h-full items-center justify-center text-slate-300">
                                <i class="fa fa-image text-5xl"></i>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-accu-dark/20 to-transparent"></div>

                    </div>

                    {{-- CONTENT --}}
                    <div class="flex flex-1 flex-col p-6">

                        <div class="flex-1">

                            <p class="min-h-[100px] whitespace-pre-line text-sm leading-7 text-slate-600">
                                {{ $category->description ?: 'Informasi kategori produk belum tersedia.' }}
                            </p>

                            <div class="my-5 border-t border-slate-200"></div>

                            <p class="text-sm font-medium text-accu-dark">
                                {{ $category->products->count() }} produk tersedia
                            </p>

                        </div>

                        {{-- BUTTON --}}
                        <button
                            type="button"
                            @click="openCatalog(@js($category->id))"
                            class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-accu-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800"
                        >
                            Lihat Produk

                            <svg width="17"
                                height="17"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2">

                                <path d="M7 17 17 7"/>
                                <path d="M7 7h10v10"/>

                            </svg>
                        </button>

                    </div>

                </div>

            @empty

                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-16 text-center">

                    <i class="fa fa-tags text-4xl text-slate-300"></i>

                    <h3 class="mt-4 text-lg font-bold text-accu-dark">
                        Kategori Belum Tersedia
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Saat ini belum ada kategori produk yang tersedia.
                    </p>

                </div>

            @endforelse

        </div>

        {{-- BOTTOM CTA --}}
        <div class="mt-16 rounded-3xl bg-gradient-to-r from-blue-950 via-blue-900 to-blue-700 px-8 py-10 text-center sm:px-12 lg:flex lg:items-center lg:justify-between lg:text-left">

            <div>

                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-300">
                    Quality Products, Trusted Solutions
                </span>

                <h3 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">
                    Temukan Produk yang Anda Butuhkan.
                </h3>

                <p class="mt-3 max-w-xl text-sm leading-6 text-blue-100">
                    Konsultasikan kebutuhan pengadaan produk kebersihan dan perlengkapan operasional bersama tim ACCU.
                </p>

            </div>

            <a href="#contact"
                class="mt-7 inline-flex shrink-0 items-center justify-center gap-3 rounded-full bg-white px-7 py-4 text-sm font-bold text-accu-primary transition hover:-translate-y-1 hover:bg-blue-50 lg:mt-0">

                Hubungi Kami

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M7 17 17 7"/>
                    <path d="M7 7h10v10"/>
                </svg>

            </a>

        </div>
    </div>
    </section>

    {{-- PRODUCT MODAL --}}
    <div
        x-show="showProductModal"
        x-cloak
        x-transition.opacity
        @keydown.escape.window="showProductModal = false"
        @click.self="showProductModal = false"
        class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm"
    >
        <div
            x-show="showProductModal"
            x-transition
            class="relative flex max-h-[90vh] w-full max-w-5xl flex-col overflow-hidden rounded-3xl bg-white shadow-2xl"
        >

            {{-- MODAL HEADER --}}
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5 sm:px-8">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-accu-primary">
                        Our Products
                    </span>

                    <h3
                        class="mt-1 text-xl font-extrabold text-accu-dark sm:text-2xl"
                        x-text="selectedCategory?.name"
                    ></h3>

                    <p
                        class="mt-1 text-sm text-slate-500"
                        x-text="selectedCategory?.description"
                    ></p>
                </div>

                <button
                    type="button"
                    @click="showProductModal = false"
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-600 transition hover:bg-slate-200"
                    aria-label="Tutup modal"
                >
                    <i class="fa fa-times text-lg"></i>
                </button>
            </div>

            {{-- PRODUCT LIST --}}
            <div class="overflow-y-auto p-6 sm:p-8">

                <template x-if="selectedCategory?.products?.length > 0">
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                        <template x-for="product in selectedCategory.products" :key="product.id">
                            <div class="group overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:-translate-y-1 hover:shadow-xl">

                                {{-- IMAGE --}}
                                <div class="relative h-52 overflow-hidden bg-slate-100">
                                    <template x-if="product.image">
                                        <img
                                            :src="'/storage/' + product.image"
                                            :alt="product.name"
                                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        >
                                    </template>

                                    <template x-if="!product.image">
                                        <div class="flex h-full items-center justify-center text-4xl text-slate-300">
                                            <i class="fa fa-image"></i>
                                        </div>
                                    </template>
                                </div>

                                {{-- CONTENT --}}
                                <div class="p-5">
                                    <h4
                                        class="text-lg font-extrabold text-accu-dark"
                                        x-text="product.name"
                                    ></h4>

                                    <p
                                        class="mt-2 text-sm font-medium text-accu-primary"
                                        x-text="product.subtitle"
                                        x-show="product.subtitle"
                                    ></p>

                                    <p
                                        class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-500"
                                        x-text="product.description || 'Informasi produk belum tersedia.'"
                                    ></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>

                {{-- EMPTY STATE --}}
                <template x-if="selectedCategory && (!selectedCategory.products || selectedCategory.products.length === 0)">
                    <div class="py-16 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-50 text-2xl text-accu-primary">
                            <i class="fa fa-cube"></i>
                        </div>

                        <h4 class="mt-5 text-lg font-bold text-accu-dark">
                            Produk Belum Tersedia
                        </h4>

                        <p class="mt-2 text-sm text-slate-500">
                            Saat ini belum ada produk aktif pada kategori ini.
                        </p>
                    </div>
                </template>
            </div>

            {{-- MODAL FOOTER --}}
            <div class="border-t border-slate-100 px-6 py-4 text-right sm:px-8">
                <button
                    type="button"
                    @click="showProductModal = false"
                    class="rounded-xl border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                >
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
