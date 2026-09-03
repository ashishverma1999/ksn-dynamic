<section id="downloads" class="bg-slate-50 py-20 lg:py-28 relative border-t border-slate-200/60">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:items-center">
            <!-- Brochure Card / Preview -->
            <div class="relative group">
                <div class="overflow-hidden rounded-3xl bg-white p-3 shadow-2xl border border-slate-200">
                    <img 
                        src="{{ asset(ltrim($brochureImage, '/')) }}" 
                        alt="{{ $school['name'] }} Official Brochure & Prospectus" 
                        class="w-full max-h-[500px] object-contain rounded-2xl group-hover:scale-[1.02] transition-transform duration-300"
                    >
                </div>
                <div class="mt-4 flex items-center justify-center gap-3">
                    <a href="{{ asset(ltrim($brochureImage, '/')) }}" target="_blank" class="btn-navy text-xs py-2.5">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        <span>View Full Prospectus</span>
                    </a>
                    <a href="{{ asset(ltrim($brochureImage, '/')) }}" download="{{ $school['short'] ?? 'KSNPS' }}-School-Brochure.jpeg" class="btn-gold text-xs py-2.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span>Download Brochure</span>
                    </a>
                </div>
            </div>

            <!-- Text and Quick Links -->
            <div>
                <span class="eyebrow-badge eyebrow-badge-gold">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    Prospectus & Information Hub
                </span>
                <h2 class="mt-3 section-title">Download Prospectus & Key Information</h2>
                <div class="section-rule mt-5"></div>

                <p class="mt-6 text-base sm:text-lg leading-relaxed text-slate-600">
                    Get all essential information regarding our educational framework, fee guidelines, transport coverage, school timings, and code of conduct for the upcoming academic session.
                </p>

                <!-- Quick Action Cards Grid -->
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    @foreach ($quickLinks as $link)
                        <a href="{{ $link['url'] }}" class="modern-card p-4 flex items-center justify-between group hover:bg-amber-500 hover:text-white transition-all">
                            <div class="flex items-center gap-3">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-800 group-hover:bg-white group-hover:text-slate-900 font-bold">
                                    ★
                                </span>
                                <span class="font-bold text-sm text-[#0b2545] group-hover:text-white">{{ $link['label'] }}</span>
                            </div>
                            <svg class="w-5 h-5 text-amber-500 group-hover:text-white group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    @endforeach
                </div>

                <div class="mt-8 rounded-2xl bg-amber-100/60 border border-amber-300/60 p-5 flex items-start gap-4">
                    <div class="flex-none text-2xl">📋</div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-900">Need personal counseling?</h4>
                        <p class="text-xs text-slate-700 mt-0.5">Visit the school administrative office in Mungra Badshahpur Monday to Saturday (8:00 AM – 3:30 PM) or call <strong>{{ $school['phone'] }}</strong> / <strong>{{ $school['alternate_phone'] }}</strong>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
