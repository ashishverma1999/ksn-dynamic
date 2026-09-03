<header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/95 backdrop-blur-md transition-all shadow-xs">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6">
        <!-- Logo / Brand Identity -->
        <a href="#home" class="flex min-w-0 items-center gap-3.5 group" aria-label="{{ $school['name'] }} home">
            <div class="relative flex h-12 w-12 sm:h-13 sm:w-13 flex-none items-center justify-center rounded-xl bg-white p-1 shadow-sm border border-slate-200/80 group-hover:scale-105 group-hover:shadow-md transition-all duration-300">
                <img src="{{ asset('images/logo.png') }}" alt="{{ $school['name'] }} Logo" class="h-full w-full object-contain">
            </div>
            <div class="min-w-0">
                <span class="block font-serif text-lg font-black leading-tight text-[#0b2545] sm:text-xl tracking-tight">{{ $school['name'] }}</span>
                <span class="block truncate text-[11px] font-bold uppercase tracking-wider text-emerald-700">Mungra Badshahpur, Jaunpur</span>
            </div>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="hidden items-center gap-1 xl:gap-2 lg:flex" aria-label="Primary navigation">
            <a href="#home" class="nav-item">Home</a>
            
            @foreach ($navGroups as $label => $items)
                <div class="relative group">
                    <a href="{{ $items[0]['href'] }}" class="nav-item inline-flex items-center gap-1">
                        <span>{{ $label }}</span>
                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-amber-500 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="invisible absolute left-0 top-full w-60 rounded-xl border border-slate-100 bg-white p-2 opacity-0 shadow-xl transition-all duration-200 group-hover:visible group-hover:opacity-100 group-hover:translate-y-1">
                        @foreach ($items as $item)
                            <a href="{{ $item['href'] }}" class="block rounded-lg px-3.5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-amber-50 hover:text-[#0b2545] transition-colors">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <a href="#gallery" class="nav-item">Gallery ({{ $allImagesCount ?? 37 }})</a>
            <a href="#contact" class="nav-item">Contact</a>

            <a href="#admissions" class="ml-3 inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 px-4 py-2.5 text-sm font-extrabold text-white shadow-md hover:from-amber-600 hover:to-amber-700 hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                <span>Admissions 2026</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </nav>

        <!-- Mobile Action Buttons & Menu Toggle -->
        <div class="flex items-center gap-2 lg:hidden">
            <!-- Mobile Direct WhatsApp Icon Button -->
            <a 
                href="https://wa.me/{{ $school['whatsapp'] ?? '919793856502' }}?text=Hello%20Happy%20Model%20Public%20School%2C%20I%20would%20like%20to%20enquire%20about%20admissions." 
                target="_blank" 
                rel="noopener" 
                class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white shadow-md active:scale-95 transition-all" 
                aria-label="Chat on WhatsApp" 
                title="Chat on WhatsApp"
            >
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
            </a>

            <!-- Mobile Menu Toggle Button -->
            <button type="button" class="menu-toggle flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-50 active:bg-slate-100" aria-expanded="false" aria-controls="mobile-menu" aria-label="Toggle Navigation">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <nav id="mobile-menu" class="hidden border-t border-slate-200 bg-white px-5 py-6 lg:hidden max-h-[85vh] overflow-y-auto" aria-label="Mobile navigation">
        <div class="grid gap-2">
            <a href="#home" class="block rounded-lg px-3 py-2 text-base font-bold text-[#0b2545] hover:bg-amber-50">Home</a>
            
            @foreach ($navGroups as $label => $items)
                <div class="pt-2">
                    <p class="px-3 text-xs font-black uppercase tracking-wider text-amber-600">{{ $label }}</p>
                    <div class="mt-1 grid gap-1 pl-2">
                        @foreach ($items as $item)
                            <a href="{{ $item['href'] }}" class="block rounded-lg px-3 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 hover:text-[#0b2545]">{{ $item['label'] }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="pt-2">
                <a href="#gallery" class="block rounded-lg px-3 py-2 text-base font-bold text-[#0b2545] hover:bg-amber-50">Photo Gallery ({{ $allImagesCount ?? 37 }})</a>
                <a href="#contact" class="block rounded-lg px-3 py-2 text-base font-bold text-[#0b2545] hover:bg-amber-50">Contact Us</a>
            </div>

            <div class="mt-4 pt-4 border-t border-slate-100 flex flex-col gap-3">
                <!-- Mobile Language Selector -->
                <div class="flex items-center justify-between rounded-xl bg-slate-100 p-2.5">
                    <span class="text-xs font-bold text-slate-700">Language / भाषा:</span>
                    <div class="inline-flex rounded-lg bg-white p-1 shadow-xs border border-slate-200" data-language-switcher>
                        <button type="button" class="lang-btn is-active px-2.5 py-1 rounded text-xs font-bold text-amber-600" data-lang="en">
                            🇬🇧 English
                        </button>
                        <button type="button" class="lang-btn px-2.5 py-1 rounded text-xs font-bold text-slate-600" data-lang="hi">
                            🇮🇳 हिन्दी
                        </button>
                    </div>
                </div>

                <!-- WhatsApp Mobile Drawer CTA -->
                <a 
                    href="https://wa.me/{{ $school['whatsapp'] ?? '919793856502' }}?text=Hello%20Happy%20Model%20Public%20School%2C%20I%20would%20like%20to%20enquire%20about%20admissions." 
                    target="_blank" 
                    rel="noopener" 
                    class="flex items-center justify-center gap-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 py-3 text-sm font-bold text-white shadow-md active:scale-98 transition-all"
                >
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>WhatsApp: {{ $school['whatsapp_display'] ?? '+91 97938 56502' }}</span>
                </a>

                <a href="#admissions" class="flex items-center justify-center gap-2 rounded-xl bg-amber-500 py-3 text-sm font-bold text-white shadow-md">
                    <span>Apply for Admission</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="tel:{{ $school['phone'] }}" class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-50">
                    <span>Call: {{ $school['phone'] }}</span>
                </a>
            </div>
        </div>
    </nav>
</header>
