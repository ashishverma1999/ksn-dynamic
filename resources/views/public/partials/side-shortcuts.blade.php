<!-- Persistent Floating WhatsApp & Contact Shortcuts in Down Right Corner -->
<div class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 flex flex-col items-end gap-3" aria-label="Floating Action Shortcuts">
    <!-- Desktop quick pills (Call & Apply) -->
    <div class="hidden sm:flex flex-col gap-2.5 items-end">
        <a 
            href="tel:{{ $school['phone'] }}" 
            class="floating-action-pill bg-[#0b2545] hover:bg-[#133b68] text-white shadow-lg border border-white/10"
            title="Call School Office"
        >
            <svg class="w-4 h-4 text-amber-400 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <span class="font-bold text-xs">Call Us</span>
        </a>
        <a 
            href="#admissions" 
            class="floating-action-pill bg-amber-500 hover:bg-amber-600 text-slate-950 shadow-lg border border-amber-400/50"
            title="Admission Enquiry Form"
        >
            <svg class="w-4 h-4 text-slate-950 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            <span class="font-bold text-xs">Apply Now</span>
        </a>
    </div>

    <!-- Main Floating WhatsApp Icon Button (Mobile & Desktop) -->
    <a 
        href="https://wa.me/{{ $school['whatsapp'] ?? '919793856502' }}?text=Hello%20KSN%20Public%20School%2C%20I%20would%20like%20to%20enquire%20about%20admissions." 
        target="_blank" 
        rel="noopener" 
        class="group relative flex h-14 w-14 sm:h-15 sm:w-15 items-center justify-center rounded-full bg-[#25D366] text-white shadow-2xl shadow-emerald-950/40 hover:bg-[#20ba59] hover:scale-105 active:scale-95 transition-all duration-300 ring-4 ring-white/80"
        aria-label="Chat on WhatsApp"
        title="Chat on WhatsApp: {{ $school['whatsapp_display'] ?? '+91 97938 56502' }}"
    >
        <!-- Online Pulse Indicator -->
        <span class="absolute top-0 right-0 flex h-3.5 w-3.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-400 border-2 border-white"></span>
        </span>

        <svg class="w-7 h-7 sm:w-8 sm:h-8 fill-current drop-shadow-sm group-hover:rotate-6 transition-transform" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>

        <!-- Hover Tooltip on desktop -->
        <span class="pointer-events-none absolute right-full mr-3 hidden sm:block whitespace-nowrap rounded-xl bg-[#07192f] px-3 py-1.5 text-xs font-extrabold text-white opacity-0 shadow-lg transition-all group-hover:opacity-100 group-hover:-translate-x-1 border border-white/10">
            WhatsApp Admission Desk
        </span>
    </a>
</div>
