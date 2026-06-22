<footer class="text-white py-10 relative overflow-hidden"
        style="background: linear-gradient(90deg, #4a0902, #650d02, #07167a); background-size: 200% 100%; animation: bgShift 15s ease infinite;">

    <div class="absolute inset-x-0 top-0 h-16 bg-linear-to-b from-white/10 to-transparent z-0 pointer-events-none"></div>

    <div class="container mx-auto px-6 text-center relative z-10">
        <p class="mb-5 text-sm md:text-base font-semibold tracking-wide text-center bg-linear-to-r from-[#fc8375] via-[#ffd700] to-[#fc8375] bg-clip-text text-transparent animate-gradient-text">
            © {{ date('Y') }} Манана Магомедова та Петро Крижанівський — Усі права захищені.
        </p>

        <div class="flex justify-center space-x-8 text-xl mb-6">
            <a href="https://www.instagram.com/peter.kryzhanovskiy/" target="_blank" rel="noopener" aria-label="Instagram" class="glow-icon transition duration-300 hover:scale-110">
                <x-icons.instagram class="w-6 h-6 md:w-7 md:h-7 text-[#fc8375]" />
            </a>
            <a href="https://www.youtube.com/@PETER-KRY" target="_blank" rel="noopener" aria-label="YouTube" class="glow-icon transition duration-300 hover:scale-110">
                <x-icons.youtube class="w-6 h-6 md:w-7 md:h-7 text-[#ff0000]" />
            </a>
            <a href="https://t.me/Patien_Zero" target="_blank" rel="noopener" aria-label="Telegram" class="glow-icon transition duration-300 hover:scale-110">
                <x-icons.telegram class="w-6 h-6 md:w-7 md:h-7 text-[#0088cc]" />
            </a>
        </div>

        {{-- Підпис розробника --}}
        <div class="mt-8 pt-6 border-t border-white/10">
            <a href="https://t.me/realvaleriykomar" target="_blank" rel="noopener" class="group inline-flex items-center justify-center">
                <span class="text-xs uppercase tracking-widest text-white/70 group-hover:text-white/90 transition-colors duration-300">Розробник сайту</span>
                <span class="mx-2 text-sm font-medium bg-linear-to-r from-[#ffd700] to-[#ffffff] bg-clip-text text-transparent group-hover:from-[#ffffff] group-hover:to-[#ffd700] transition-all duration-500">Валерій Комар</span>
                <x-icons.telegram class="h-4 w-4 text-[#0088cc] opacity-70 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300" />
            </a>
        </div>
    </div>
</footer>
