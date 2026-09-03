<section id="birthdays" class="relative bg-gradient-to-b from-amber-50/40 via-white to-orange-50/30 py-20 lg:py-28 border-t border-amber-200/50 overflow-hidden">
    <!-- Decorative background elements -->
    <div class="pointer-events-none absolute -top-24 -left-24 h-96 w-96 rounded-full bg-amber-200/30 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-24 -right-24 h-96 w-96 rounded-full bg-orange-200/30 blur-3xl"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 relative">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-gold">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500 animate-ping"></span>
                    🎉 Campus Celebrations & Achievements
                </span>
                <h2 class="mt-3 section-title">Birthday Stars & Student Spotlight</h2>
                <p class="mt-3 text-slate-600 text-base sm:text-lg leading-relaxed">
                    Celebrating our wonderful students and faculty on their special days! Sending heartfelt blessings, warmth, and wishes for bright achievements and joyful milestones ahead.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="inline-flex items-center gap-2 rounded-full bg-amber-100/80 px-4 py-2 text-xs font-bold text-amber-900 border border-amber-300/60 shadow-xs">
                    <span>🎂 Wishing Everyone A Bright Future!</span>
                </div>
            </div>
        </div>

        <!-- Birthday Cards Grid -->
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($birthdays as $birthday)
                <div class="group relative rounded-3xl bg-white p-6 shadow-xl hover:shadow-2xl border border-amber-100 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between overflow-hidden">
                    <!-- Top Ribbon Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-extrabold shadow-xs {{ $birthday['type'] === 'Teacher' ? 'bg-indigo-100 text-indigo-800 border border-indigo-200' : ($birthday['type'] === 'Star Student' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 'bg-amber-100 text-amber-900 border border-amber-300') }}">
                            {{ $birthday['badge'] ?? 'Birthday Star' }}
                        </span>
                    </div>

                    <div>
                        <!-- Avatar & Info -->
                        <div class="flex items-center gap-4 mt-2">
                            <div class="relative">
                                <div class="h-20 w-20 rounded-2xl overflow-hidden ring-4 ring-amber-400/40 shadow-md bg-slate-100 flex-none group-hover:scale-105 transition-transform duration-300">
                                    <img 
                                        src="{{ asset(ltrim($birthday['image'] ?? '/images/classroom1.jpeg', '/')) }}" 
                                        alt="{{ $birthday['name'] }}"
                                        class="h-full w-full object-cover"
                                        onerror="this.src='/images/classroom1.jpeg'"
                                    >
                                </div>
                                <span class="absolute -bottom-2 -right-1 text-xl drop-shadow">🎉</span>
                            </div>

                            <div class="pr-2">
                                <span class="text-[11px] font-bold uppercase tracking-wider text-amber-700 bg-amber-50 px-2 py-0.5 rounded-md inline-block mb-1">
                                    {{ $birthday['type'] ?? 'Student' }}
                                </span>
                                <h3 class="font-extrabold text-lg text-[#0b2545] leading-snug group-hover:text-amber-600 transition-colors">
                                    {{ $birthday['name'] }}
                                </h3>
                                <p class="text-xs font-semibold text-slate-500 mt-0.5">
                                    {{ $birthday['class_or_role'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Birthday Date Badge -->
                        @if (!empty($birthday['birth_date']))
                            <div class="mt-4 inline-flex items-center gap-2 rounded-xl bg-orange-50 px-3 py-1.5 text-xs font-bold text-orange-800 border border-orange-200/60">
                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>Birthday: {{ $birthday['birth_date'] }}</span>
                            </div>
                        @endif

                        <!-- Wishes Text -->
                        @if (!empty($birthday['wishes']))
                            <p class="mt-4 text-xs leading-relaxed text-slate-600 italic bg-slate-50/70 p-3 rounded-2xl border border-slate-100">
                                "{{ $birthday['wishes'] }}"
                            </p>
                        @endif
                    </div>

                    <!-- Card Footer Note -->
                    <div class="mt-5 pt-3 border-t border-amber-100 flex items-center justify-between text-[11px] font-bold text-amber-700">
                        <span class="flex items-center gap-1">
                            <span>✨</span> Best Wishes from KSNPS
                        </span>
                        <span>🎈 🎂</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-3xl bg-amber-50 border border-amber-200 p-8 text-center">
                    <p class="text-base text-amber-900 font-bold">No active birthday entries at this moment. You can add birthdays anytime via the Admin Panel!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
