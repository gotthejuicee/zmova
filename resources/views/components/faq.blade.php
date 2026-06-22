<section id="faq" class="py-16 md:py-24 relative text-white overflow-hidden"
         style="background-image: url('{{ asset('images/books-photo.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm z-0"></div>

    <svg class="absolute top-6 left-6 w-24 h-24 opacity-10 stroke-[#ffd700] gold-glow" fill="none" stroke-width="1.2" viewBox="0 0 100 100">
        <path d="M10,90 Q50,10 90,90" />
        <path d="M20,80 Q50,30 80,80" />
    </svg>
    <svg class="absolute bottom-6 right-6 w-24 h-24 opacity-10 stroke-[#ffd700] gold-glow" fill="none" stroke-width="1.2" viewBox="0 0 100 100">
        <path d="M10,10 Q50,90 90,10" />
        <path d="M20,20 Q50,70 80,20" />
    </svg>

    <div class="container mx-auto px-4 sm:px-6 relative z-20">
        <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-center mb-6 bg-linear-to-r from-[#fc8375] via-[#ffd700] to-[#ffffffcc] bg-clip-text text-transparent animate-on-scroll">
            Відповіді на запитання
        </h2>

        <div class="flex justify-center mb-10 animate-on-scroll delay-300">
            <svg class="w-32 h-8 opacity-60 stroke-[#ffd700]" fill="none" stroke-width="1" viewBox="0 0 200 50">
                <path d="M10,25 Q50,0 100,25 T190,25" />
            </svg>
        </div>

        <div class="max-w-3xl mx-auto space-y-8 text-[#f3f3f3]">
            {{-- Питання 1 --}}
            <div class="animate-on-scroll delay-200">
                <h3 class="text-xl sm:text-2xl font-semibold mb-2 flex items-center justify-center gap-2 text-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#ffd86e] shrink-0 glowing-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M10 9C10 7.34315 11.3431 6 13 6C14.6569 6 16 7.34315 16 9C16 10.3062 15.1654 11.4175 14 11.8293C13.3925 12.0203 13 12.5968 13 13.2285V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="12" cy="18" r="1" fill="currentColor"/>
                    </svg>
                    <span>Де можна придбати книгу?</span>
                </h3>
                <p class="text-center text-sm sm:text-base">Книга доступна на нашому сайті, а також у великих книжкових магазинах та онлайн-платформах.</p>
            </div>

            {{-- Питання 2 --}}
            <div class="animate-on-scroll delay-400">
                <h3 class="text-xl sm:text-2xl font-semibold mb-2 flex items-center justify-center gap-2 text-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#ffd86e] shrink-0 glowing-icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 14V16H6V14H3Z"/>
                        <path d="M7 10V20H10V10H7Z"/>
                        <path d="M11 6V18H14V6H11Z"/>
                        <path d="M15 10V20H18V10H15Z"/>
                        <path d="M19 14V16H22V14H19Z"/>
                    </svg>
                    <span>Чи є аудіокнига?</span>
                </h3>
                <p class="text-center text-sm sm:text-base">Ні, аудіоверсії "ЗМОВА" наразі немає, але вона планується в майбутньому.</p>
            </div>

            {{-- Питання 3 --}}
            <div class="animate-on-scroll delay-600">
                <h3 class="text-xl sm:text-2xl font-semibold mb-2 flex items-center justify-center gap-2 text-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#ffd86e] shrink-0 glowing-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M16.5 12C16.5 14.4853 14.4853 16.5 12 16.5C9.51472 16.5 7.5 14.4853 7.5 12C7.5 9.51472 9.51472 7.5 12 7.5C12.8284 7.5 13.5 6.82843 13.5 6C13.5 5.17157 12.8284 4.5 12 4.5C7.85786 4.5 4.5 7.85786 4.5 12C4.5 16.1421 7.85786 19.5 12 19.5C16.1421 19.5 19.5 16.1421 19.5 12C19.5 10.0201 18.7068 8.20688 17.4201 6.875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 6V9L15 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Чи планується продовження?</span>
                </h3>
                <p class="text-center text-sm sm:text-base">Автори працюють над новою книгою, але деталі поки не розголошуються.</p>
            </div>
        </div>
    </div>
</section>
