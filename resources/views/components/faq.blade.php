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

        <div class="max-w-3xl mx-auto space-y-4 animate-on-scroll delay-200">
            @foreach (config('book.faq') as $item)
                <div x-data="{ open: false }"
                     class="border border-[#ffd700]/20 rounded-xl bg-black/30 backdrop-blur-sm overflow-hidden transition-colors duration-300"
                     :class="open && 'border-[#ffd700]/50 shadow-[0_0_20px_#ffd70022]'">
                    <button type="button" @click="open = !open" :aria-expanded="open"
                            class="w-full flex items-center justify-between gap-4 text-left px-5 py-4 sm:px-6 sm:py-5">
                        <span class="flex items-center gap-3 text-lg sm:text-xl font-semibold text-[#f3f3f3]">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#ffd86e] shrink-0 glowing-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M10 9C10 7.34315 11.3431 6 13 6C14.6569 6 16 7.34315 16 9C16 10.3062 15.1654 11.4175 14 11.8293C13.3925 12.0203 13 12.5968 13 13.2285V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <circle cx="12" cy="18" r="1" fill="currentColor"/>
                            </svg>
                            <span>{{ $item['q'] }}</span>
                        </span>
                        <svg class="w-5 h-5 text-[#ffd700] shrink-0 transition-transform duration-300" :class="open && 'rotate-180'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms x-cloak>
                        <p class="px-5 pb-5 sm:px-6 sm:pb-6 pl-14 sm:pl-15 text-sm sm:text-base text-[#f3f3f3]/85 leading-relaxed">
                            {{ $item['a'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Служба турботи --}}
        <p class="text-center mt-10 text-[#f3f3f3]/80 animate-on-scroll">
            Не знайшли відповідь?
            <a href="{{ config('book.support_url') }}" target="_blank" rel="noopener"
               class="inline-flex items-center gap-1 text-[#ffd700] font-semibold hover:text-yellow-300 transition">
                <x-icons.telegram class="w-4 h-4" /> Напишіть нам у Telegram
            </a>
        </p>
    </div>
</section>
