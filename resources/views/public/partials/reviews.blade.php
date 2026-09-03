<section id="reviews" class="bg-white py-20 lg:py-28 relative border-t border-slate-200/60" data-review-carousel>
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-gold">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    Community Trust
                </span>
                <h2 class="mt-3 section-title">What Parents & Guardians Say About HMPS</h2>
                <p class="mt-3 text-slate-600 text-base">Hear from the families whose children learn, grow, and flourish at Happy Model Public School.</p>
            </div>

            <!-- Carousel Nav Buttons -->
            <div class="flex items-center gap-2 self-start md:self-auto">
                <button type="button" class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-700 hover:bg-amber-50 hover:border-amber-400 transition-all shadow-xs" data-review-prev aria-label="Previous Review">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-700 hover:bg-amber-50 hover:border-amber-400 transition-all shadow-xs" data-review-next aria-label="Next Review">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <!-- Reviews Grid on Desktop / Slides on Mobile -->
        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($reviews as $review)
                <article class="modern-card p-6 flex flex-col justify-between relative bg-gradient-to-b from-white to-slate-50/50">
                    <div>
                        <!-- Star Rating -->
                        <div class="flex items-center gap-1 text-amber-500 text-sm">
                            @for ($i = 0; $i < ($review['rating'] ?? 5); $i++)
                                <span>★</span>
                            @endfor
                        </div>

                        <!-- Quote -->
                        <p class="mt-4 text-sm leading-relaxed text-slate-700 italic">
                            "{{ $review['text'] }}"
                        </p>
                    </div>

                    <!-- Author Info -->
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-[#0b2545] text-amber-400 flex items-center justify-center font-bold text-sm flex-none">
                            {{ substr($review['name'], 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-[#0b2545]">{{ $review['name'] }}</h4>
                            <p class="text-[11px] text-slate-500 font-semibold">{{ $review['role'] }}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
