<footer id="contact" class="bg-[#07192f] text-white pt-20 pb-10 relative overflow-hidden border-t border-white/10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="grid gap-12 lg:grid-cols-[1.2fr_0.8fr_1fr]">
            <!-- Column 1: School Identity & Address -->
            <div>
                <div class="flex items-center gap-3.5">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white p-1.5 shadow-md flex-none">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ $school['name'] }} Logo" class="h-full w-full object-contain">
                    </div>
                    <div>
                        <h2 class="font-serif text-2xl font-black text-white leading-none">{{ $school['name'] }}</h2>
                        <p class="text-xs font-bold text-amber-400 uppercase tracking-widest mt-1">Mungra Badshahpur, Jaunpur</p>
                    </div>
                </div>

                <p class="mt-5 text-sm leading-relaxed text-slate-300 max-w-md">
                    {{ $school['tagline'] }} An English-medium co-educational institution committed to academic excellence, strong moral values, and student well-being.
                </p>

                <div class="mt-6 space-y-3 text-xs sm:text-sm text-slate-300">
                    <p class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-amber-400 flex-none mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ $school['address'] }}</span>
                    </p>
                    <p class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-amber-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <a href="tel:{{ $school['phone'] }}" class="hover:text-amber-400 transition-colors font-bold">{{ $school['phone'] }}</a>
                        @if (!empty($school['alternate_phone']))
                            <span class="text-slate-500">|</span>
                            <a href="tel:{{ $school['alternate_phone'] }}" class="hover:text-amber-400 transition-colors font-bold">{{ $school['alternate_phone'] }}</a>
                        @endif
                    </p>
                    <p class="flex items-center gap-2.5">
                        <span class="text-emerald-400 text-sm">💬</span>
                        <a href="https://wa.me/{{ $school['whatsapp'] ?? '919793856502' }}" target="_blank" rel="noopener" class="hover:text-emerald-400 transition-colors font-bold text-emerald-400">WhatsApp: {{ $school['whatsapp_display'] ?? '+91 97938 56502' }}</a>
                    </p>
                    <p class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-amber-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:{{ $school['email'] }}" class="hover:text-amber-400 transition-colors">{{ $school['email'] }}</a>
                    </p>
                </div>
            </div>

            <!-- Column 2: Quick Links Navigation -->
            <div>
                <h3 class="text-sm font-black uppercase tracking-widest text-amber-400">Quick Navigation</h3>
                <div class="mt-5 grid grid-cols-2 gap-2 text-xs sm:text-sm text-slate-300">
                    <a href="#about" class="hover:text-amber-400 transition-colors py-1">About {{ $school['short'] ?? 'KSNPS' }}</a>
                    <a href="#vision-mission" class="hover:text-amber-400 transition-colors py-1">Vision & Mission</a>
                    <a href="#academics" class="hover:text-amber-400 transition-colors py-1">Curriculum</a>
                    <a href="#leadership" class="hover:text-amber-400 transition-colors py-1">Leadership Desk</a>
                    <a href="#facilities" class="hover:text-amber-400 transition-colors py-1">Facilities & Labs</a>
                    <a href="#transport" class="hover:text-amber-400 transition-colors py-1">Transport Fleet</a>
                    <a href="#birthdays" class="hover:text-amber-400 transition-colors py-1">Birthday Stars 🎉</a>
                    <a href="#gallery" class="hover:text-amber-400 transition-colors py-1">Campus Photos</a>
                    <a href="#reviews" class="hover:text-amber-400 transition-colors py-1">Parent Reviews</a>
                    <a href="#downloads" class="hover:text-amber-400 transition-colors py-1">Prospectus</a>
                    <a href="#faqs" class="hover:text-amber-400 transition-colors py-1">FAQs</a>
                </div>

                <div class="mt-8">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">School Office Hours</p>
                    <p class="text-sm font-semibold text-white mt-1">{{ $school['office_timing'] ?? 'Monday to Saturday, 8:00 AM - 3:30 PM' }}</p>
                </div>
            </div>

            <!-- Column 3: Location Map & Admission CTA -->
            <div>
                <h3 class="text-sm font-black uppercase tracking-widest text-amber-400">Campus Location</h3>
                
                <!-- Map Container / Directions -->
                <div class="mt-5 rounded-2xl overflow-hidden border border-white/15 bg-white/5 p-1 h-44 relative group">
                    <iframe 
                        src="{{ $school['map_embed'] ?? 'https://maps.google.com/maps?q=Mungra+Badshahpur,+Jaunpur,+Uttar+Pradesh+222202&t=&z=14&ie=UTF8&iwloc=&output=embed' }}" 
                        class="w-full h-full rounded-xl filter grayscale group-hover:grayscale-0 transition-all duration-300"
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        title="{{ $school['name'] }} location map"
                    ></iframe>
                </div>

                <div class="mt-4 flex flex-wrap gap-2">
                    <a href="#admissions" class="btn-gold text-xs py-2 w-full text-center">
                        <span>Apply Online for Admission</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright & Admin Access Bar -->
        <div class="mt-14 pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
            <p>
                Copyright &copy; {{ now()->year }} <strong>{{ $school['name'] }}</strong>. All rights reserved.
            </p>
            <div class="flex items-center gap-4">
                <a href="#home" class="hover:text-white transition-colors">Back to Top ↑</a>
                <span>•</span>
                <a href="{{ url('/schoolAdmin') }}" class="text-amber-400 hover:underline font-bold">Admin Portal Login</a>
            </div>
        </div>
    </div>
</footer>
