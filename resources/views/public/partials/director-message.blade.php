<section id="leadership" class="bg-slate-50 py-20 lg:py-28 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="max-w-2xl">
                <span class="eyebrow-badge eyebrow-badge-gold">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    Leadership & Guidance
                </span>
                <h2 class="mt-3 section-title">Messages from Our Leadership Desk</h2>
                <p class="mt-3 text-slate-600 text-base">Inspiring values, academic integrity, and personalized mentorship from our leadership team.</p>
            </div>
            <a href="#contact" class="btn-navy text-sm self-start md:self-auto">Connect with Office</a>
        </div>

        <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($messages as $message)
                <article class="modern-card overflow-hidden flex flex-col justify-between group">
                    <div class="relative">
                        <!-- Portrait Image with Zoom Effect -->
                        <div class="h-72 w-full overflow-hidden bg-slate-200">
                            <img 
                                src="{{ $message['image'] ?? asset('images/director.jpeg') }}" 
                                alt="{{ $message['name'] }} - {{ $message['title'] }}" 
                                class="h-full w-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                                onerror="this.onerror=null; this.src='{{ asset("images/director.jpeg") }}';"
                            >
                        </div>
                        <!-- Role Badge Overlay -->
                        <div class="absolute bottom-3 left-3 right-3">
                            <span class="inline-block rounded-lg bg-[#07192f]/90 px-3 py-1 text-xs font-bold text-amber-400 backdrop-blur-md">
                                {{ $message['role'] ?? $message['title'] }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-serif text-xl font-black text-[#0b2545]">{{ $message['name'] }}</h3>
                            <p class="text-xs font-bold uppercase tracking-wider text-emerald-700 mt-1">{{ $message['title'] }}</p>
                            @if (!empty($message['designation']))
                                <p class="text-[11px] font-semibold text-slate-500 mt-1 leading-snug bg-slate-50 p-2 rounded-lg border border-slate-100">{{ $message['designation'] }}</p>
                            @endif
                            
                            <blockquote class="mt-4 text-xs sm:text-sm leading-relaxed text-slate-600 italic relative before:content-['“'] before:text-2xl before:text-amber-400 before:mr-1">
                                {{ $message['text'] }}
                            </blockquote>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-slate-500">
                            <span>{{ $school['short'] ?? 'KSNPS' }} Leadership</span>
                            <span class="text-amber-600">★ ★ ★</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
