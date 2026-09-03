<section class="relative overflow-hidden bg-[#07192f] text-white min-h-[90vh] flex flex-col justify-between" data-hero-carousel>
    <!-- Background Slideshow -->
    <div class="absolute inset-0 overflow-hidden">
        @foreach ($heroImages as $image)
            <img src="{{ asset(ltrim($image, '/')) }}" alt="{{ $school['name'] }} campus photograph" class="hero-slide {{ $loop->first ? 'is-active' : '' }}">
        @endforeach
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#07192f]/95 via-[#0b2545]/80 to-[#07192f]/70"></div>
        <div class="absolute inset-0 bg-radial-at-c from-transparent via-transparent to-[#07192f]/80"></div>
    </div>

    <!-- Main Content Container -->
    <div class="relative z-10 mx-auto grid max-w-7xl content-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-[1.2fr_380px] lg:py-24 my-auto">
        <div class="max-w-3xl">
            <!-- Admission Open Badge -->
            <div class="inline-flex items-center gap-2 rounded-full border border-amber-400/40 bg-amber-400/10 px-4 py-1.5 backdrop-blur-md">
                <span class="flex h-2.5 w-2.5 rounded-full bg-amber-400 animate-pulse"></span>
                <span class="text-xs font-black uppercase tracking-widest text-amber-400">Admissions Open 2026–27 (Pre-Nursery – XII)</span>
            </div>

            <!-- Main Heading -->
            <h1 class="mt-6 font-serif text-4xl font-black leading-[1.1] sm:text-6xl lg:text-6xl tracking-tight text-white drop-shadow-sm">
                {{ $school['name'] }}
            </h1>

            <!-- Subtitle -->
            <p class="mt-4 text-lg sm:text-xl font-medium text-slate-200 max-w-2xl leading-relaxed">
                {{ $school['tagline'] }}
            </p>

            <!-- Feature Highlights List -->
            <div class="mt-6 flex flex-wrap items-center gap-3 text-xs sm:text-sm font-semibold text-slate-300">
                <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/10 px-3 py-1.5 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Pre-Nursery to Class XII
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/10 px-3 py-1.5 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Science, Commerce & Arts
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/10 px-3 py-1.5 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Smart Classrooms & Science Labs
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-lg bg-white/10 px-3 py-1.5 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Safe Van Transport
                </span>
            </div>

            <!-- CTA Action Buttons -->
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="#admissions" class="btn-gold shadow-lg shadow-amber-500/20">
                    <span>Enquire for Admission</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="#gallery" class="btn-outline-white">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>View Campus Photos ({{ $allImagesCount ?? 37 }})</span>
                </a>
                <a href="#downloads" class="btn-outline-white text-sm py-2">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Prospectus</span>
                </a>
            </div>
        </div>

        <!-- Live Notice Board Card -->
        <aside id="notices" class="rounded-2xl border border-white/20 bg-white/10 p-6 backdrop-blur-xl shadow-2xl self-center lg:self-auto">
            <div class="flex items-center justify-between border-b border-white/15 pb-4">
                <div class="flex items-center gap-2">
                    <span class="flex h-3 w-3 rounded-full bg-amber-400 animate-ping"></span>
                    <h2 class="text-lg font-black tracking-wide text-white">Notice Board</h2>
                </div>
                <span class="rounded bg-amber-400/20 px-2 py-0.5 text-[10px] font-extrabold uppercase text-amber-300">Live Updates</span>
            </div>

            <div class="mt-4 grid gap-3 max-h-72 overflow-y-auto pr-1">
                @foreach ($notices as $notice)
                    <article class="rounded-xl border border-white/10 bg-slate-900/60 p-3.5 hover:bg-slate-900/80 transition-all hover:border-amber-400/40">
                        <div class="flex items-center justify-between text-[11px] font-bold">
                            <span class="text-amber-400 uppercase tracking-wider">{{ $notice['badge'] ?? 'Notice' }}</span>
                            <time class="text-slate-400">{{ \Illuminate\Support\Carbon::parse($notice['date'])->format('d M Y') }}</time>
                        </div>
                        <p class="mt-1.5 text-xs sm:text-sm font-medium leading-snug text-slate-200">{{ $notice['title'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="mt-4 pt-3 border-t border-white/10 flex items-center justify-between text-xs text-slate-300">
                <span>📍 Mungra Badshahpur Campus</span>
                <a href="#admissions" class="text-amber-400 hover:text-amber-300 font-bold underline">Contact Office →</a>
            </div>
        </aside>
    </div>

    <!-- Carousel Indicator Dots -->
    <div class="relative z-10 mx-auto mb-6 flex items-center gap-2" data-hero-dots>
        <!-- Dots injected via JS -->
    </div>
</section>
