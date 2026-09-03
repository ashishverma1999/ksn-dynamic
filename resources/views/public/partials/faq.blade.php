<section id="faqs" class="bg-slate-50 py-20 lg:py-28 relative border-t border-slate-200/60">
    <div class="mx-auto max-w-4xl px-4 sm:px-6">
        <div class="text-center">
            <span class="eyebrow-badge eyebrow-badge-gold">
                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                Parent Assistance
            </span>
            <h2 class="mt-3 section-title">Frequently Asked Questions</h2>
            <p class="mt-3 text-slate-600 text-base">Quick answers to common queries regarding admissions, transport, curriculum, and school routines.</p>
        </div>

        <div class="mt-12 space-y-4">
            @foreach ($faqs as $faq)
                <div class="faq-item {{ $loop->first ? 'is-active' : '' }}" data-faq-item>
                    <button type="button" class="w-full p-5 sm:p-6 text-left flex items-center justify-between gap-4 font-bold text-base sm:text-lg text-[#0b2545] hover:text-amber-600 transition-colors" data-faq-toggle>
                        <span>{{ $faq['q'] }}</span>
                        <span class="flex h-8 w-8 flex-none items-center justify-center rounded-full bg-slate-100 text-slate-600 transition-transform duration-200 group-hover:bg-amber-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </button>
                    <div class="faq-answer px-5 sm:px-6 pb-6 text-slate-600 text-sm sm:text-base leading-relaxed border-t border-slate-100 pt-3">
                        <p>{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <p class="text-sm font-semibold text-slate-600">Still have a question?</p>
            <div class="mt-3 flex flex-wrap justify-center gap-3">
                <a href="tel:{{ $school['phone'] }}" class="btn-navy text-xs py-2">Call Office: {{ $school['phone'] }}</a>
                <a href="#admissions" class="btn-gold text-xs py-2">Send Admission Query</a>
            </div>
        </div>
    </div>
</section>
