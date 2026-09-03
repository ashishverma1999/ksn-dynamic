<!-- Facilities Section -->
<section id="facilities" class="bg-[#0b2545] py-20 lg:py-28 relative text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="max-w-3xl">
            <span class="eyebrow-badge eyebrow-badge-white">
                <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                World-Class Infrastructure
            </span>
            <h2 class="mt-4 font-serif text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight">
                Modern Campus Facilities for Balanced Growth
            </h2>
            <p class="mt-4 text-slate-300 text-base sm:text-lg">
                Designed to make every school day productive, engaging, secure, and comfortable for students from pre-nursery through senior secondary (12th grade).
            </p>
        </div>

        <!-- Facilities Cards Grid -->
        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $facilityIcons = [
                    'classroom' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                    'computer' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>',
                    'library' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
                    'sports' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    'bus' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>',
                    'shield' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                    'medical' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                    'stage' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/>',
                ];
            @endphp

            @foreach ($facilities as $facility)
                <article class="rounded-2xl border border-white/15 bg-white/5 p-6 backdrop-blur-sm hover:bg-white/10 hover:border-amber-400/50 transition-all group">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-400/20 text-amber-400 group-hover:bg-amber-400 group-hover:text-[#0b2545] transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $facilityIcons[$facility['icon'] ?? 'classroom'] ?? $facilityIcons['classroom'] !!}
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-white">{{ $facility['title'] }}</h3>
                    <p class="mt-2 text-sm text-slate-300 leading-relaxed">{{ $facility['text'] }}</p>
                </article>
            @endforeach
        </div>

        <!-- Real Classrooms Preview Strip -->
        <div class="mt-16 pt-12 border-t border-white/15">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h3 class="text-xl font-bold text-white">Classroom Environments at HMPS</h3>
                    <p class="text-xs sm:text-sm text-slate-300">Bright, airy, well-furnished spaces fostering student concentration.</p>
                </div>
                <a href="#gallery" class="text-sm font-bold text-amber-400 hover:text-amber-300 inline-flex items-center gap-1">
                    <span>View all classroom photos →</span>
                </a>
            </div>

            <div class="grid gap-4 sm:grid-cols-3">
                <div class="relative rounded-xl overflow-hidden h-52 group">
                    <img src="{{ asset('images/classroom1.jpeg') }}" alt="Classroom interior at HMPS" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex items-end p-4">
                        <span class="text-xs font-bold text-white">Smart Classroom 1</span>
                    </div>
                </div>
                <div class="relative rounded-xl overflow-hidden h-52 group">
                    <img src="{{ asset('images/classroom2.jpeg') }}" alt="Classroom study session" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex items-end p-4">
                        <span class="text-xs font-bold text-white">Interactive Junior Wing</span>
                    </div>
                </div>
                <div class="relative rounded-xl overflow-hidden h-52 group">
                    <img src="{{ asset('images/classroom3.jpeg') }}" alt="Student seating and desks" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex items-end p-4">
                        <span class="text-xs font-bold text-white">Concept Discussion Room</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Transport Van Spotlight Section -->
<section id="transport" class="bg-white py-20 lg:py-24 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div>
                <span class="eyebrow-badge eyebrow-badge-gold">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    Safe Student Transport
                </span>
                <h2 class="mt-3 section-title">Reliable School Van Service Connecting Mungra Badshahpur & Nearby Areas</h2>
                <div class="section-rule mt-5"></div>

                <p class="mt-6 text-base sm:text-lg leading-relaxed text-slate-600">
                    We understand that punctual, secure commute is top priority for parents. Happy Model Public School operates dedicated school vans with disciplined drivers and care attendants to ensure children travel safely between home and campus.
                </p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <div class="flex items-center gap-2 text-emerald-700 font-bold text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Verified & Trained Drivers</span>
                        </div>
                        <p class="mt-1 text-xs text-slate-600">Strict adherence to speed limits and child safety norms.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <div class="flex items-center gap-2 text-emerald-700 font-bold text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Doorstep / Route Pickups</span>
                        </div>
                        <p class="mt-1 text-xs text-slate-600">Covering key residential pockets around Mungra Badshahpur & Jaunpur.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <div class="flex items-center gap-2 text-emerald-700 font-bold text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Lady Care Attendant</span>
                        </div>
                        <p class="mt-1 text-xs text-slate-600">Assisting tiny tots during boarding and drop-off.</p>
                    </div>
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <div class="flex items-center gap-2 text-emerald-700 font-bold text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>First Aid Box on Board</span>
                        </div>
                        <p class="mt-1 text-xs text-slate-600">Emergency medical kit and emergency contact protocols.</p>
                    </div>
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#admissions" class="btn-gold text-sm">Enquire About Transport Routes</a>
                    <a href="tel:{{ $school['phone'] }}" class="btn-navy text-sm">Call Office for Stops</a>
                </div>
            </div>

            <!-- Transport Photo Card -->
            <div class="relative overflow-hidden rounded-3xl shadow-2xl border border-slate-200 group">
                <img src="{{ asset(ltrim($transportImage, '/')) }}" alt="{{ $school['name'] }} transport van" class="w-full h-[400px] object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-[#07192f] via-[#07192f]/70 to-transparent p-6 text-white">
                    <span class="rounded bg-amber-400 px-2 py-0.5 text-xs font-black text-slate-950 uppercase">HMPS Fleet</span>
                    <h3 class="mt-2 font-serif text-xl font-bold">Safe & Supervised Van Travel</h3>
                    <p class="text-xs text-slate-200 mt-1">Convenient daily pickup and drop routines for student comfort.</p>
                </div>
            </div>
        </div>
    </div>
</section>
