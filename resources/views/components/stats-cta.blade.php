<section class="relative py-16 md:py-20 text-white overflow-hidden bg-[#0d0708] text-center">
    <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-[#ffd700]/40 to-transparent"></div>
    <div class="absolute inset-x-0 bottom-0 h-px bg-linear-to-r from-transparent via-[#ffd700]/40 to-transparent"></div>

    <div class="container mx-auto px-6 relative z-10 animate-on-scroll">
        <p class="text-6xl md:text-7xl font-extrabold bg-linear-to-r from-[#fc8375] via-[#ffd700] to-[#ffd700] bg-clip-text text-transparent drop-shadow-[0_0_25px_#ffd70055]">
            <span x-data="counter({{ (int) config('book.readers_count') }})" x-text="display">{{ number_format((int) config('book.readers_count'), 0, '.', ' ') }}</span><span>+</span>
        </p>
        <p class="mt-3 text-lg md:text-xl tracking-wide text-[#f3f3f3]/90 font-medium">
            читачів вже обрали «ЗМОВУ»
        </p>

        <a href="#order"
           class="inline-flex items-center justify-center gap-2 mt-8 uppercase tracking-wider px-8 py-4 rounded-full font-bold text-base md:text-lg
                  text-white bg-linear-to-r from-[#7a1103] via-[#d82412] to-[#ffd700]
                  shadow-[0_0_25px_#ffd70066] ring-2 ring-[#ffd700]/30 transition-all duration-300
                  hover:scale-105 hover:shadow-[0_0_35px_#ffd700aa]">
            Замовити книгу
        </a>
    </div>
</section>
