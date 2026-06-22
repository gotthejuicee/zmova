<section id="author" class="py-16 md:py-24 relative text-white overflow-hidden"
         style="background-image: url('{{ asset('images/old_lib.webp') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm z-0"></div>

    <svg class="absolute left-0 top-12 w-16 sm:w-24 h-16 sm:h-24 opacity-10" fill="none" stroke="gold" stroke-width="1.2" viewBox="0 0 100 100">
        <path d="M10,50 C30,10 70,90 90,50" />
    </svg>
    <svg class="absolute right-0 top-12 w-16 sm:w-24 h-16 sm:h-24 opacity-10" fill="none" stroke="gold" stroke-width="1.2" viewBox="0 0 100 100">
        <path d="M10,50 C30,90 70,10 90,50" />
    </svg>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-center mb-4 bg-linear-to-r from-[#fc8375] via-[#ffd700] to-[#ffffffdd] bg-clip-text text-transparent drop-shadow-lg animate-on-scroll">
            ПРО АВТОРІВ
        </h2>
        <div class="w-24 h-1 mx-auto bg-linear-to-r from-transparent via-[#ffd700] to-transparent rounded-full mb-12 md:mb-16 animate-on-scroll delay-200"></div>

        <div class="space-y-16">
            {{-- Манана --}}
            <div class="flex flex-col md:flex-row items-center animate-on-scroll delay-[300ms]">
                <div class="md:w-1/3 flex flex-col items-center mb-8 md:mb-0">
                    <img src="{{ asset('images/manana_frame.webp') }}" alt="Манана Магомедова"
                         class="rounded-full w-40 h-40 sm:w-44 sm:h-44 md:w-48 md:h-48 object-cover">
                    <h3 class="mt-4 text-xl sm:text-2xl font-semibold text-[#f3f3f3]">Манана Магомедова</h3>
                    <a href="https://www.instagram.com/iammananiko_/" target="_blank" rel="noopener"
                       class="inline-flex items-center font-semibold mt-2 text-[#fd9386] hover:text-[#f47a6d] transition duration-300">
                        <x-icons.instagram class="w-4 h-4 mr-2" /> Instagram
                    </a>
                </div>

                <div class="md:w-2/3 md:pl-10 text-center md:text-left space-y-4 text-[#f3f3f3]">
                    <p class="text-base sm:text-lg font-medium leading-relaxed opacity-0 translate-y-4 animate-fade-in-up delay-[400ms]">
                        Манана Магомедова — талановита письменниця, чиї твори здобули визнання завдяки <span class="text-[#fc8375] font-semibold">глибоким емоційним сюжетам</span> та майстерному опису людських стосунків.
                    </p>
                    <p class="text-base sm:text-lg font-light italic opacity-0 translate-y-4 animate-fade-in-up delay-[500ms]">
                        Її книги читають у різних країнах по всьому світу. Натхнення вона черпає з подорожей і культурного розмаїття, що надає її стилю особливої <span class="underline decoration-[#ffd700]/60">унікальності</span>.
                    </p>
                    <div class="mt-6 bg-[#2a1b1f]/50 p-4 sm:p-6 rounded-lg border border-[#ffd700]/20 shadow-[0_0_15px_#ffd70033] animate-on-scroll delay-[600ms]">
                        <div class="flex items-start gap-2">
                            <p class="text-sm sm:text-base italic text-[#f3f3f3] leading-relaxed">
                                🪶 "Кожна історія — це подорож у серце читача, де слова стають мостами між культурами."
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Петро --}}
            <div class="flex flex-col md:flex-row items-center animate-on-scroll delay-[600ms]">
                <div class="md:w-1/3 flex flex-col items-center mb-8 md:mb-0">
                    <img src="{{ asset('images/petro_frame.webp') }}" alt="Петро Крижанівський"
                         class="rounded-full w-40 h-40 sm:w-44 sm:h-44 md:w-48 md:h-48 object-cover">
                    <h3 class="mt-4 text-xl sm:text-2xl font-semibold text-[#f3f3f3]">Петро Крижанівський</h3>
                    <a href="https://www.instagram.com/peter.kryzhanovskiy/" target="_blank" rel="noopener"
                       class="inline-flex items-center font-semibold mt-2 text-[#fd9386] hover:text-[#f47a6d] transition duration-300">
                        <x-icons.instagram class="w-4 h-4 mr-2" /> Instagram
                    </a>
                    <a href="https://www.youtube.com/@PATIENT-ZERO" target="_blank" rel="noopener"
                       class="inline-flex items-center font-semibold mt-2 text-[#fd9386] hover:text-[#f47a6d] transition duration-300">
                        <x-icons.youtube class="w-4 h-4 mr-2" /> YouTube
                    </a>
                </div>

                <div class="md:w-2/3 md:pl-10 text-center md:text-left space-y-4 text-[#f3f3f3]">
                    <p class="text-base sm:text-lg font-medium leading-relaxed opacity-0 translate-y-4 animate-fade-in-up delay-[700ms]">
                        Петро Крижанівський — відомий автор, чиї романи досліджують <span class="text-[#fc8375] font-semibold">моральні дилеми</span> та історичні контексти.
                    </p>
                    <p class="text-base sm:text-lg font-light italic opacity-0 translate-y-4 animate-fade-in-up delay-[800ms]">
                        Його твори продані накладом понад <span class="font-semibold text-white">3 мільйони примірників</span> і здобули міжнародне визнання. Петро — лауреат престижних премій, майстер слова й мислитель нового покоління.
                    </p>
                    <div class="mt-6 bg-[#2a1b1f]/50 p-4 sm:p-6 rounded-lg border border-[#ffd700]/20 shadow-[0_0_15px_#ffd70033] animate-on-scroll delay-[900ms]">
                        <div class="flex items-start gap-2">
                            <p class="text-sm sm:text-base italic text-[#f3f3f3] leading-relaxed">
                                🪶 "Слова — це ключі до минулого, що відкривають двері до майбутнього."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
