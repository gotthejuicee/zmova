<section class="relative pt-24 bg-center hero-bg">
    <div class="relative container mx-auto px-6 h-full flex items-start justify-center">
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-[90rem] 2xl:max-w-[95rem] relative">

            {{-- Блок авторів над мокапом --}}
            <div class="flex flex-row justify-between w-full max-w-4xl px-0 sm:px-6 md:px-8 absolute top-[-80px] md:top-[-40px] z-10 authors-block animate-on-scroll">
                {{-- Манана --}}
                <div class="flex flex-col items-center text-center">
                    <h3 class="author-shimmer text-base md:text-xl font-semibold">
                        Манана <br>Магомедова
                    </h3>
                    <div>
                        <img src="{{ asset('images/manana_frame_black.webp') }}" alt="Манана Магомедова" width="500" height="500"
                             class="rounded-full w-28 h-28 md:w-[200px] md:h-[200px] object-cover" loading="lazy">
                    </div>
                    <div class="flex flex-col items-center space-y-1 text-xs md:text-base font-medium">
                        <span class="gold-label">Письменниця</span>
                        <span class="gold-label">Бізнес-леді</span>
                        <span class="gold-label">Журналіст</span>
                    </div>
                </div>

                {{-- Петро --}}
                <div class="flex flex-col items-center text-center">
                    <h3 class="author-shimmer text-base md:text-xl font-semibold">
                        Петро <br>Крижанівський
                    </h3>
                    <div>
                        <img src="{{ asset('images/petro_frame_black.webp') }}" alt="Петро Крижанівський" width="500" height="500"
                             class="rounded-full w-28 h-28 md:w-[200px] md:h-[200px] object-cover" loading="lazy">
                    </div>
                    <div class="flex flex-col items-center space-y-1 text-xs md:text-base font-medium">
                        <span class="gold-label">Письменник</span>
                        <span class="gold-label">Підприємець</span>
                        <span class="gold-label">Ментор</span>
                    </div>
                </div>
            </div>

            {{-- Мокап книги --}}
            <div class="flex flex-col items-center flex-shrink-0 mockup-book">
                <img src="{{ asset('images/Змова_MockUp_4.webp') }}" alt="Мокап книги ЗМОВА" width="918" height="736"
                     class="max-w-[300px] h-auto animate-zoom-in delay-200" loading="eager" fetchpriority="high" decoding="async"
                     style="border:none; box-shadow:none; outline:none; background:transparent;">
                <div class="mt-60 md:mt-72 text-white text-center space-y-2 animate-on-scroll delay-400">
                    <p class="text-lg md:text-xl font-semibold tracking-wide premium-black">Жанр: роман</p>
                    <p class="text-lg md:text-xl font-semibold tracking-wide premium-black">Мова: українська</p>
                    <p class="text-lg md:text-xl font-semibold tracking-wide premium-black">Обʼєм: 350+ сторінок</p>
                    <p class="text-lg md:text-xl font-semibold tracking-wide premium-black">Вартість: 500грн</p>
                    <a href="https://t.me/geraua" target="_blank" rel="noopener" class="premium-button" aria-label="Замовити в Telegram"></a>
                </div>
            </div>
        </div>
    </div>
</section>
