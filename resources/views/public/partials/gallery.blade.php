<section id="gallery" class="bg-slate-100 py-20 lg:py-28 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <!-- Header & Category Filter Buttons -->
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-gold">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    Campus Photo Gallery
                </span>
                <h2 class="mt-3 section-title">Life & Moments at {{ $school['name'] }}</h2>
                <p class="mt-3 text-slate-600 text-base">Explore our vibrant classrooms, cultural celebrations, sports day drills, science projects, and campus facilities ({{ count($galleryItems) }} photos).</p>
            </div>

            <!-- Filter Controls -->
            <div class="flex flex-wrap gap-2" aria-label="Gallery category filters">
                <button type="button" class="filter-btn is-active" data-gallery-filter="all">
                    <span>All Photos</span>
                    <span class="rounded-full bg-slate-200 px-1.5 py-0.2 text-[11px] font-extrabold text-slate-700">{{ count($galleryItems) }}</span>
                </button>
                @foreach ($galleryCategories as $cat)
                    @php
                        $catCount = collect($galleryItems)->where('category', $cat)->count();
                    @endphp
                    <button type="button" class="filter-btn" data-gallery-filter="{{ $cat }}">
                        <span>{{ $cat }}</span>
                        <span class="rounded-full bg-slate-200 px-1.5 py-0.2 text-[11px] font-extrabold text-slate-700">{{ $catCount }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Images Grid -->
        <div class="mt-12 grid gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4" data-gallery-grid>
            @foreach ($galleryItems as $item)
                <article 
                    class="gallery-item group h-64 sm:h-72" 
                    data-gallery-item
                    data-gallery-category="{{ $item['category'] }}"
                    data-image-src="{{ asset(ltrim($item['image'], '/')) }}"
                    data-image-title="{{ $item['title'] }}"
                    data-image-desc="{{ $item['description'] ?? 'Campus moment at ' . $school['name'] }}"
                >
                    <img 
                        src="{{ asset(ltrim($item['image'], '/')) }}" 
                        alt="{{ $item['title'] }}" 
                        loading="lazy" 
                        class="h-full w-full object-cover"
                    >
                    <div class="gallery-overlay"></div>
                    
                    <!-- Caption Info on Hover/Card -->
                    <div class="absolute bottom-0 inset-x-0 p-4 text-white z-10">
                        <span class="inline-block rounded bg-amber-400/90 px-2 py-0.5 text-[10px] font-black uppercase tracking-wider text-slate-950 backdrop-blur-xs">
                            {{ $item['category'] }}
                        </span>
                        <h3 class="mt-1.5 text-sm sm:text-base font-bold leading-snug line-clamp-2 text-white group-hover:text-amber-300 transition-colors">
                            {{ $item['title'] }}
                        </h3>
                    </div>

                    <!-- View Icon Top Right -->
                    <div class="absolute top-3 right-3 h-8 w-8 rounded-full bg-black/40 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity backdrop-blur-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Lightbox Modal for Gallery -->
<div id="gallery-lightbox" class="lightbox-modal" role="dialog" aria-modal="true" aria-label="Photo Viewer">
    <!-- Dark Backdrop -->
    <div class="lightbox-backdrop absolute inset-0"></div>

    <!-- Modal Content Container -->
    <div class="relative z-10 max-w-5xl w-full mx-4 my-auto bg-slate-900 rounded-2xl overflow-hidden shadow-2xl border border-white/10 flex flex-col max-h-[92vh]">
        <!-- Top Toolbar -->
        <div class="flex items-center justify-between px-5 py-3.5 bg-slate-950/80 border-b border-white/10 text-white">
            <div class="flex items-center gap-3">
                <span class="rounded bg-amber-400 px-2 py-0.5 text-xs font-bold text-slate-950" data-lightbox-category>Campus</span>
                <span class="text-xs text-slate-400 font-bold" data-lightbox-counter>1 / {{ count($galleryItems) }}</span>
            </div>
            <button type="button" class="text-slate-300 hover:text-white rounded-lg p-1.5 hover:bg-white/10 transition-colors" data-lightbox-close aria-label="Close Lightbox">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Image Container -->
        <div class="relative flex-1 bg-black flex items-center justify-center min-h-[320px] max-h-[68vh] overflow-hidden p-2">
            <img src="" alt="" class="max-h-full max-w-full object-contain mx-auto" data-lightbox-img>

            <!-- Prev / Next Navigation Buttons -->
            <button type="button" class="absolute left-3 top-1/2 -translate-y-1/2 flex h-11 w-11 items-center justify-center rounded-full bg-slate-950/70 text-white hover:bg-amber-500 hover:text-slate-950 transition-all shadow-lg backdrop-blur-sm" data-lightbox-prev aria-label="Previous Photo">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 flex h-11 w-11 items-center justify-center rounded-full bg-slate-950/70 text-white hover:bg-amber-500 hover:text-slate-950 transition-all shadow-lg backdrop-blur-sm" data-lightbox-next aria-label="Next Photo">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

        <!-- Bottom Caption Bar -->
        <div class="p-4 sm:p-5 bg-slate-950 text-white">
            <h3 class="text-base sm:text-lg font-bold text-white" data-lightbox-title>Photo Title</h3>
            <p class="mt-1 text-xs sm:text-sm text-slate-300" data-lightbox-desc>Photo description</p>
        </div>
    </div>
</div>
