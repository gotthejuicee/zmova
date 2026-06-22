<nav class="site-nav w-full shadow-lg z-50">
    <div class="container mx-auto px-6 flex items-center justify-between h-16">

        {{-- Логотип / заголовок --}}
        <a href="javascript:void(0)" class="pointer-events-none flex items-center space-x-3 group select-none">
            <span class="text-2xl md:text-4xl font-oswald font-semibold shimmer-gold">ЗМОВА:</span>
            <span class="text-2xl md:text-3xl font-caveat italic shimmer-gold">День, коли зло переможе...</span>
        </a>

        {{-- Бургер-меню (pure CSS) --}}
        <input type="checkbox" id="menu-toggle" class="hidden" />
        <label for="menu-toggle" class="burger-menu md:hidden" aria-label="Меню" role="button" tabindex="0">
            <span></span>
            <span></span>
            <span></span>
        </label>

        {{-- Навігація (на десктопі — у рядок праворуч; на мобільному — випадає під шапку) --}}
        <div id="nav-links"
             class="md:space-x-8 md:items-center md:w-auto md:bg-transparent md:flex-row md:p-0 md:rounded-none">

            <div class="absolute top-0 left-0 w-full h-1 z-10">
                <div class="w-full h-full bg-linear-to-r from-transparent via-[#0a0a0a] to-transparent opacity-80"></div>
            </div>

            <a href="#plot" class="font-oswald text-gold">СЮЖЕТ</a>
            <a href="#author" class="font-oswald text-gold">АВТОРИ</a>
            <a href="#order" class="font-oswald text-gold">ЗАМОВИТИ</a>
            <a href="#faq" class="font-oswald text-gold">ЗАПИТАННЯ</a>
        </div>
    </div>
</nav>
