<!-- About KSNPS Section -->
<section id="about" class="bg-white py-20 lg:py-28 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div>
                <span class="eyebrow-badge eyebrow-badge-gold">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    About {{ $school['name'] }}
                </span>
                
                <h2 class="mt-4 section-title">
                    A school built around learning, values, and holistic care.
                </h2>
                
                <div class="section-rule mt-5"></div>

                <div class="mt-6 space-y-4 text-base sm:text-lg leading-relaxed text-slate-600">
                    <p>
                        Established with a mission to deliver accessible, high-quality, English-medium education in Mungra Badshahpur, Jaunpur, <strong>{{ $school['name'] }} ({{ $school['short'] ?? 'KSNPS' }})</strong> creates an environment where young minds are encouraged to question, explore, and excel.
                    </p>
                    <p>
                        Our pedagogical philosophy balances academic clarity with moral values, neat handwriting, disciplined habits, physical health, public speaking confidence, and active co-curricular participation.
                    </p>
                </div>

                <!-- Stats Grid -->
                <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-4">
                    @foreach ($stats as $stat)
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4 text-center hover:border-amber-400/50 hover:bg-amber-50/50 transition-all">
                            <strong class="block font-serif text-3xl sm:text-4xl font-black text-[#0b2545]">{{ $stat['value'] }}</strong>
                            <span class="mt-1 block text-xs sm:text-sm font-bold text-slate-700">{{ $stat['label'] }}</span>
                            <span class="mt-0.5 block text-[11px] text-slate-500 hidden sm:block">{{ $stat['detail'] ?? '' }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#vision-mission" class="btn-navy text-sm">
                        <span>Our Vision & Values</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <a href="#admissions" class="btn-gold text-sm">
                        <span>Visit Our Campus</span>
                    </a>
                </div>
            </div>

            <!-- Campus Image Mosaic -->
            <div class="grid grid-cols-2 gap-3.5 sm:gap-4">
                @foreach ($aboutImages->take(4) as $image)
                    <div class="relative overflow-hidden rounded-2xl shadow-md group {{ $loop->first ? 'row-span-2 h-full min-h-[300px]' : 'h-44 sm:h-52' }}">
                        <img src="{{ asset(ltrim($image, '/')) }}" alt="{{ $school['name'] }} campus life" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                            <span class="text-xs font-bold text-white uppercase tracking-wider">Campus View</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section id="vision-mission" class="bg-slate-50 py-16 lg:py-24 border-y border-slate-200/60">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="text-center max-w-3xl mx-auto">
            <span class="eyebrow-badge eyebrow-badge-navy">Guiding Principles</span>
            <h2 class="mt-3 font-serif text-3xl sm:text-4xl font-black text-[#0b2545]">Vision, Mission & Core Values</h2>
            <p class="mt-3 text-slate-600 text-base">Shaping students into enlightened, compassionate, and self-reliant leaders of tomorrow.</p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2">
            <!-- Vision Card -->
            <div class="modern-card p-6 sm:p-8 bg-gradient-to-br from-white to-amber-50/40 border-l-4 border-l-amber-500">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-500/10 text-amber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#0b2545]">Our Vision</h3>
                </div>
                <p class="mt-4 text-base leading-relaxed text-slate-700">
                    {{ $visionMission['vision'] ?? 'To be a premier center of holistic K-12 education (Pre-Nursery to Class XII) that fosters intellectual curiosity, moral integrity, scientific temperament, and lifelong learning.' }}
                </p>
            </div>

            <!-- Mission Card -->
            <div class="modern-card p-6 sm:p-8 bg-gradient-to-br from-white to-emerald-50/40 border-l-4 border-l-emerald-600">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-600/10 text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#0b2545]">Our Mission</h3>
                </div>
                <p class="mt-4 text-base leading-relaxed text-slate-700">
                    {{ $visionMission['mission'] ?? 'To provide a stimulating, safe, and modern learning environment with balanced focus on foundational literacy, board exam excellence, competitive stream preparation, physical vitality, and communication.' }}
                </p>
            </div>
        </div>

        <!-- 4 Core Pillars Grid -->
        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($visionMission['values'] ?? [] as $val)
                <div class="modern-card p-5 bg-white">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-100 text-amber-700 font-black text-sm">
                        {{ $loop->iteration }}
                    </div>
                    <h4 class="mt-3 font-bold text-base text-[#0b2545]">{{ $val['title'] }}</h4>
                    <p class="mt-1.5 text-xs sm:text-sm text-slate-600 leading-normal">{{ $val['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Academics Wing Section -->
<section id="academics" class="bg-white py-20 lg:py-28 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-gold">Academic Excellence</span>
                <h2 class="mt-3 section-title">Structured Curriculum from Pre-Nursery to Class XII</h2>
                <p class="mt-3 text-slate-600 text-base">Comprehensive progression from joyful foundational play-way learning to senior secondary stream mastery (Science, Commerce & Arts).</p>
            </div>
            <a href="#admissions" class="btn-navy text-sm self-start md:self-auto">Check Class Eligibility →</a>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($academics as $wing)
                <article class="modern-card p-7 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute top-0 right-0 h-24 w-24 bg-amber-400/10 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform"></div>
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="inline-block rounded-full bg-amber-100 px-3 py-1 text-xs font-black text-amber-800 uppercase tracking-wider">{{ $wing['classes'] }}</span>
                            <span class="text-xs font-semibold text-slate-500">{{ $wing['tag'] ?? '' }}</span>
                        </div>
                        
                        <h3 class="mt-5 font-serif text-2xl font-black text-[#0b2545]">{{ $wing['title'] }}</h3>
                        <p class="mt-3 text-sm sm:text-base leading-relaxed text-slate-600">{{ $wing['text'] }}</p>
                        
                        <div class="mt-6 pt-5 border-t border-slate-100">
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2.5">Key Focus Areas:</p>
                            <ul class="space-y-2">
                                @foreach ($wing['highlights'] ?? ['Interactive learning', 'Language skills', 'Concept clarity', 'Activities'] as $highlight)
                                    <li class="flex items-center gap-2 text-xs sm:text-sm font-semibold text-slate-700">
                                        <svg class="w-4 h-4 text-emerald-600 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        <span>{{ $highlight }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <a href="#admissions" class="mt-8 inline-flex items-center gap-1.5 text-sm font-bold text-amber-600 hover:text-amber-700 group-hover:translate-x-1 transition-all">
                        <span>Enquire for this wing</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
