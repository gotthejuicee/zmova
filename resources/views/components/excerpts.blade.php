@php
    $excerpts = [
        ['color' => '#fc8375', 'text' => 'Світ змінюється не раптово. Він тріщить по швах тихо, поки люди ще сплять. Листя ще не встигло пожовтіти, а вже у повітрі пахне холодом…'],
        ['color' => '#ffd700', 'text' => '…Він відкрив очі, і вперше відчув — щось не так. Дерева стояли на місці, небо було тихим. Але тиша була не природна, а наче накрита чорною тканиною.'],
        ['color' => '#fc8375', 'text' => 'Перший день осені, що не схожий на інші. Сторінки щоденника ще чисті, але на серці — темний відбиток майбутнього.'],
    ];
@endphp

<section id="excerpt" class="py-16 md:py-24 relative text-white overflow-hidden bg-cover bg-center"
         style="background-image: url('{{ asset('images/magaz.avif') }}')">
    <div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/60 to-black/40 backdrop-blur-sm z-0"></div>

    <svg class="absolute top-8 left-8 w-16 sm:w-20 h-16 sm:h-20 opacity-20 text-[#ffd700]" fill="none" viewBox="0 0 100 100" aria-hidden="true">
        <path stroke="currentColor" stroke-width="1.5" stroke-linecap="round" d="M20 50 Q40 20 60 50 T100 50" />
    </svg>
    <svg class="absolute bottom-12 right-12 w-20 sm:w-24 h-20 sm:h-24 opacity-15 text-[#fc8375]" fill="none" viewBox="0 0 100 100" aria-hidden="true">
        <path stroke="currentColor" stroke-width="1.5" stroke-linecap="round" d="M10 50 C40 80 60 20 90 50" />
    </svg>

    <div class="container mx-auto px-4 sm:px-6 relative z-10 max-w-6xl">
        <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-center mb-8 bg-linear-to-r from-[#fc8375] via-[#ffd700] to-[#ffd700] bg-clip-text text-transparent animate-on-scroll">
            Прочитати уривок
        </h2>

        <div class="w-24 h-1 mx-auto bg-linear-to-r from-transparent via-[#ffd700] to-transparent rounded-full mb-12 md:mb-16 animate-on-scroll delay-200"></div>

        <div class="grid gap-6 md:gap-8 lg:grid-cols-3 animate-on-scroll delay-400">
            @foreach ($excerpts as $excerpt)
                <div class="group relative bg-white/5 p-6 sm:p-8 rounded-2xl shadow-xl ring-1 ring-white/10 hover:ring-[#ffd700]/30 transition-all duration-300 hover:-translate-y-1">
                    <span class="absolute top-2 left-2 sm:top-4 sm:left-4 text-5xl sm:text-7xl font-serif select-none pointer-events-none"
                          style="color: {{ $excerpt['color'] }}33" aria-hidden="true">“</span>
                    <p class="relative text-lg leading-relaxed text-white/90 italic font-serif pl-8 sm:pl-10">
                        {{ $excerpt['text'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
