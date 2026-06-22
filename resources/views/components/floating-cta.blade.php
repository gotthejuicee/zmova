<a href="#order"
   x-data="{ shown: false }"
   x-init="window.addEventListener('scroll', () => { shown = window.scrollY > 700 }, { passive: true })"
   x-show="shown"
   x-cloak
   x-transition.opacity.duration.300ms
   class="fixed bottom-5 right-5 z-40 inline-flex items-center gap-2 px-6 py-3 rounded-full font-bold uppercase tracking-wider text-sm
          text-white bg-linear-to-r from-[#7a1103] via-[#d82412] to-[#ffd700]
          shadow-[0_0_25px_#ffd70088] ring-2 ring-[#ffd700]/40
          transition-transform duration-300 hover:scale-105">
    <x-icons.telegram class="w-4 h-4" />
    Замовити
</a>
