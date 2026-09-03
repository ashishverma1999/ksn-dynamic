<header class="relative z-40 bg-[#01315b] shadow-lg">
    <div class="mx-auto max-w-6xl px-4 py-8 text-center lg:px-0">
        <a href="#home" class="inline-flex flex-col items-center gap-3">
            <div class="flex h-16 w-16 sm:h-20 sm:w-20 items-center justify-center rounded-2xl bg-white p-2 shadow-lg">
                <img src="{{ asset('images/logo.png') }}" alt="{{ $school['name'] }} Logo" class="h-full w-full object-contain">
            </div>
            <div>
                <span class="block font-serif text-3xl font-black leading-tight text-white sm:text-5xl">{{ $school['name'] }}</span>
                <span class="block text-sm font-bold uppercase tracking-[0.22em] text-[#ffd200] mt-1">Mungra Badshahpur, Jaunpur</span>
            </div>
        </a>
    </div>
</header>
