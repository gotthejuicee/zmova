<section id="plot" class="relative py-24 text-white overflow-hidden"
         style="background-image: url('{{ asset('images/Royal.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm z-0"></div>

    {{-- Преміум SVG-завитки --}}
    <svg class="absolute top-6 left-8 w-24 h-24 opacity-10" viewBox="0 0 200 200" fill="none" stroke="#ffd700" stroke-width="1.3">
        <path d="M100 10 Q60 40 90 70 Q120 100 80 130 Q50 160 90 190" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <svg class="absolute bottom-6 right-8 w-24 h-24 opacity-10" viewBox="0 0 200 200" fill="none" stroke="#ffd700" stroke-width="1.3">
        <path d="M100 190 Q140 160 110 130 Q80 100 120 70 Q150 40 110 10" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>

    <div class="container mx-auto px-6 relative z-20 max-w-6xl">
        <h2 class="text-5xl md:text-6xl font-extrabold text-center mb-4 bg-linear-to-r from-[#fc8375] via-[#ffb199] to-[#ffd700] bg-clip-text text-transparent drop-shadow-[0_0_25px_#ffd70088] animate-on-scroll shimmer-effect">
            СЮЖЕТ КНИГИ
        </h2>
        <div class="w-24 h-1 mx-auto bg-linear-to-r from-transparent via-[#ffd700] to-transparent rounded-full mb-12 md:mb-16 animate-on-scroll delay-200"></div>

        <div class="flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/2 animate-on-scroll delay-300 relative">
                <img src="{{ asset('images/Змова_MockUp5.webp') }}" alt="ЗМОВА"
                     class="rounded-2xl shadow-2xl w-full max-w-md mx-auto border border-[#ffd700]/50 ring-2 ring-[#ffd700]/50 transition-transform hover:scale-105 duration-300" />

                {{-- Золоті іскри --}}
                <svg class="absolute top-3 left-3 w-5 h-5 opacity-70 animate-pulse" fill="gold" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="3" />
                </svg>
                <svg class="absolute bottom-4 right-4 w-4 h-4 opacity-50 animate-ping delay-500" fill="gold" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="2" />
                </svg>
            </div>

            <div class="md:w-1/2 md:pl-6 text-lg leading-relaxed tracking-wide space-y-6">
                <p class="text-[#f3f3f3] font-medium opacity-0 translate-y-4 animate-fade-in-up delay-[400ms]">
                    <span class="text-[#fc8375] font-bold">«ЗМОВА»</span> — це глибокий, драматичний роман про <span class="text-white font-semibold italic">долю, зраду</span> та нестримний <span class="underline decoration-[#fc8375]/70">пошук правди</span>.
                    Головний герой, опинившись у вирі таємниць, стоїть перед вибором, що назавжди <span class="text-[#ffb199] font-semibold">змінить хід його життя</span>.
                </p>
                <p class="text-[#f3f3f3] font-light italic opacity-0 translate-y-4 animate-fade-in-up delay-[600ms]">
                    Поєднуючи напружений сюжет, глибоких персонажів і філософські роздуми, ця книга стає не просто чтивом, а справжнім <span class="text-white font-semibold not-italic">шедевром сучасної літератури</span>.
                </p>
                <p class="text-[#f3f3f3] font-medium opacity-0 translate-y-4 animate-fade-in-up delay-[800ms]">
                    У кожному розділі — <span class="text-[#fc8375] font-semibold">пульсуюче напруження</span>, яке не відпускає до останньої сторінки. Це історія, яка змушує сумніватися в очевидному, переосмислювати правду та відкривати темні куточки людської природи.
                </p>
            </div>
        </div>
    </div>
</section>
