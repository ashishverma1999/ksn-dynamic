<section id="admissions" class="bg-white py-20 lg:py-28 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <!-- Admission Steps Roadmap -->
        <div id="admission-process" class="mb-20">
            <div class="text-center max-w-3xl mx-auto">
                <span class="eyebrow-badge eyebrow-badge-gold">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    Simple & Transparent
                </span>
                <h2 class="mt-3 font-serif text-3xl sm:text-4xl font-black text-[#0b2545]">
                    4-Step Admission Procedure
                </h2>
                <p class="mt-3 text-slate-600 text-base">Joining {{ $school['name'] }} is a smooth and guided experience for parents.</p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($admissionSteps as $step)
                    <div class="modern-card p-6 relative border-t-4 border-t-amber-500 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="font-serif text-3xl font-black text-amber-500/80">{{ $step['step'] }}</span>
                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            </div>
                            <h3 class="mt-3 font-bold text-lg text-[#0b2545]">{{ $step['title'] }}</h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Enquiry Form & Contact Info Section -->
        <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:items-start pt-6 border-t border-slate-200/60">
            <div>
                <span class="eyebrow-badge eyebrow-badge-navy">Get In Touch</span>
                <h2 class="mt-3 section-title">Start Your Child's Admission Conversation</h2>
                <div class="section-rule mt-5"></div>

                <p class="mt-6 text-base sm:text-lg leading-relaxed text-slate-600">
                    Fill out this form and our admission counselor will call you within 24 hours with class availability, syllabus details, campus visit scheduling, and fee guidance.
                </p>

                <!-- School Office Contact Box -->
                <div class="mt-8 space-y-4 rounded-2xl bg-slate-50 p-6 border border-slate-200/80">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500 text-white font-bold flex-none">
                            📞
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Direct Admission Helpline</p>
                            <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                                <a href="tel:{{ $school['phone'] }}" class="text-base sm:text-lg font-black text-[#0b2545] hover:text-amber-600">{{ $school['phone'] }}</a>
                                @if (!empty($school['alternate_phone']))
                                    <span class="text-slate-400 font-bold">/</span>
                                    <a href="tel:{{ $school['alternate_phone'] }}" class="text-sm sm:text-base font-bold text-[#0b2545] hover:text-amber-600">{{ $school['alternate_phone'] }}</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-3 border-t border-slate-200">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white font-bold flex-none">
                            💬
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">WhatsApp Support</p>
                            <a href="https://wa.me/{{ $school['whatsapp'] ?? '919793856502' }}?text=Hello%20KSN%20Public%20School%2C%20I%20want%20to%20know%20about%20admissions." target="_blank" rel="noopener" class="text-sm font-bold text-emerald-700 hover:underline">Chat with Admission Desk ({{ $school['whatsapp_display'] ?? '+91 97938 56502' }})</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-3 border-t border-slate-200">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white font-bold flex-none">
                            🕒
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Office Visiting Hours</p>
                            <p class="text-xs sm:text-sm font-bold text-slate-800">{{ $school['office_timing'] ?? 'Mon - Sat: 8:00 AM - 3:30 PM' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interactive Admission Enquiry Form -->
            <div class="modern-card p-6 sm:p-10 bg-white border border-slate-200/80 shadow-xl rounded-3xl relative">
                @if (session('enquiry_success'))
                    <div class="mb-6 rounded-2xl border border-emerald-500 bg-emerald-50 p-5 text-emerald-900 shadow-xs">
                        <div class="flex items-center gap-3">
                            <svg class="h-6 w-6 text-emerald-600 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div>
                                <h4 class="font-bold text-base">Enquiry Submitted Successfully!</h4>
                                <p class="text-xs sm:text-sm mt-0.5">{{ session('enquiry_success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('admissions.store') }}" data-enquiry-form class="space-y-5">
                    @csrf
                    
                    <div class="grid gap-5 sm:grid-cols-2">
                        <!-- Student Name -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0b2545] mb-1.5">
                                Student Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="student_name" value="{{ old('student_name') }}" required placeholder="e.g. Aarav Sharma" class="form-input">
                            @error('student_name') <span class="text-xs font-bold text-red-600 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Guardian Name -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0b2545] mb-1.5">
                                Parent / Guardian Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" required placeholder="e.g. Rajesh Sharma" class="form-input">
                            @error('guardian_name') <span class="text-xs font-bold text-red-600 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0b2545] mb-1.5">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="e.g. 9876543210" class="form-input">
                            @error('phone') <span class="text-xs font-bold text-red-600 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0b2545] mb-1.5">
                                Email Address (Optional)
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="e.g. parent@gmail.com" class="form-input">
                            @error('email') <span class="text-xs font-bold text-red-600 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Class Applied For -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0b2545] mb-1.5">
                                Class Seeking Admission <span class="text-red-500">*</span>
                            </label>
                            <select name="class_applied" required class="form-input">
                                <option value="">Select Class...</option>
                                @foreach ([
                                    'Pre-Nursery',
                                    'Nursery',
                                    'LKG',
                                    'UKG',
                                    'Class I',
                                    'Class II',
                                    'Class III',
                                    'Class IV',
                                    'Class V',
                                    'Class VI',
                                    'Class VII',
                                    'Class VIII',
                                    'Class IX',
                                    'Class X',
                                    'Class XI - Science (PCM/PCB)',
                                    'Class XI - Commerce',
                                    'Class XI - Humanities/Arts',
                                    'Class XII - Science (PCM/PCB)',
                                    'Class XII - Commerce',
                                    'Class XII - Humanities/Arts',
                                ] as $cls)
                                    <option value="{{ $cls }}" @selected(old('class_applied') === $cls)>{{ $cls }}</option>
                                @endforeach
                            </select>
                            @error('class_applied') <span class="text-xs font-bold text-red-600 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Student Age -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0b2545] mb-1.5">
                                Student Age (Years)
                            </label>
                            <input type="number" min="2" max="20" name="student_age" value="{{ old('student_age') }}" placeholder="e.g. 5" class="form-input">
                            @error('student_age') <span class="text-xs font-bold text-red-600 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Preferred Visit Date -->
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0b2545] mb-1.5">
                                Preferred Campus Visit Date (Optional)
                            </label>
                            <input type="date" name="preferred_visit_date" value="{{ old('preferred_visit_date') }}" class="form-input">
                            @error('preferred_visit_date') <span class="text-xs font-bold text-red-600 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Message / Questions -->
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#0b2545] mb-1.5">
                                Any Questions or Specific Requirements
                            </label>
                            <textarea name="message" rows="3" placeholder="Tell us about previous school, transport requirement, or special queries..." class="form-input">{{ old('message') }}</textarea>
                            @error('message') <span class="text-xs font-bold text-red-600 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn-gold w-full text-center text-base py-3.5 shadow-xl hover:shadow-2xl">
                        <span>Submit Admission Enquiry</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                    
                    <p class="text-center text-xs text-slate-500">🔒 Your contact details will only be used by the school office for admission communication.</p>
                </form>
            </div>
        </div>
    </div>
</section>
