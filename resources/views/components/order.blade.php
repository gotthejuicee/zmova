<section id="order" class="py-24 relative text-white overflow-hidden" x-data="orderForm"
         style="background-image: url('{{ asset('images/lib3.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm z-0"></div>

    <svg class="absolute top-10 left-10 w-16 h-16 opacity-10" viewBox="0 0 100 100" fill="none" stroke="gold" stroke-width="1.2">
        <path d="M10,50 Q50,10 90,50 Q50,90 10,50 Z" />
    </svg>
    <svg class="absolute bottom-10 right-10 w-16 h-16 opacity-10" viewBox="0 0 100 100" fill="none" stroke="gold" stroke-width="1.2">
        <path d="M10,50 Q50,90 90,50 Q50,10 10,50 Z" />
    </svg>

    <div class="container mx-auto px-6 text-center relative z-20">
        <h2 class="text-5xl md:text-6xl font-extrabold mb-6 bg-linear-to-r from-[#fc8375] via-[#ffd700] to-[#ffffffdd] bg-clip-text text-transparent drop-shadow-[0_0_25px_#ffd700aa] animate-on-scroll">
            Замовити книгу
        </h2>
        <div class="w-24 h-1 mx-auto bg-linear-to-r from-transparent via-[#ffd700] to-transparent rounded-full mb-12 md:mb-16 animate-on-scroll delay-200"></div>

        <p class="mb-10 max-w-2xl mx-auto text-[#f3f3f3] text-lg animate-on-scroll delay-300 italic">
            Отримайте примірник <span class="text-[#ffd700] font-semibold">"ЗМОВА"</span> у друкованому або електронному форматі. Доставка по всьому світу.
        </p>

        {{-- Доставка та оплата --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-3xl mx-auto mb-12 animate-on-scroll delay-300">
            @foreach (config('book.delivery') as $item)
                <div class="flex flex-col items-center gap-2 bg-white/5 border border-[#ffd700]/15 rounded-xl px-4 py-5">
                    <span class="text-[#ffd700]">
                        @switch($item['icon'])
                            @case('truck')
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7h11v8H3z"/><path d="M14 10h4l3 3v2h-7z"/><circle cx="7" cy="17" r="1.6"/><circle cx="17.5" cy="17" r="1.6"/></svg>
                                @break
                            @case('card')
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2.5" y="5" width="19" height="14" rx="2"/><path d="M2.5 9.5h19"/></svg>
                                @break
                            @case('clock')
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                                @break
                        @endswitch
                    </span>
                    <span class="font-semibold text-white">{{ $item['title'] }}</span>
                    <span class="text-sm text-[#f3f3f3]/75">{{ $item['text'] }}</span>
                </div>
            @endforeach
        </div>

        <div class="max-w-xl mx-auto bg-white/5 backdrop-blur-md p-6 sm:p-8 rounded-2xl border border-white/10 shadow-[0_0_20px_#ffd70022] animate-on-scroll delay-[400ms]">
            <form action="{{ route('order.store') }}" method="POST" class="space-y-4" @submit.prevent="submit">
                @csrf

                {{-- Time-trap: підписана мітка часу. Миттєва відправка = бот --}}
                <input type="hidden" name="started" value="{{ encrypt((string) time()) }}">

                {{-- Honeypot: приховане поле, яке заповнюють лише боти --}}
                <div aria-hidden="true" style="position:absolute; left:-9999px; top:auto; width:1px; height:1px; overflow:hidden;">
                    <label>Не заповнюйте це поле
                        <input type="text" name="website" tabindex="-1" autocomplete="off">
                    </label>
                </div>

                <input type="text" name="name" placeholder="Ваше ім'я" required maxlength="120"
                       class="w-full px-4 py-3 rounded-md bg-black/40 text-white placeholder-white border border-[#ffd700]/20 focus:outline-none focus:ring-2 focus:ring-[#ffd700]/50 transition duration-300">

                <input type="tel" name="phone" id="phone" placeholder="Ваш телефон" required
                       pattern="[\d\s()+-]*" maxlength="32" @input="filterPhone"
                       class="w-full px-4 py-3 rounded-md bg-black/40 text-white placeholder-white border border-[#ffd700]/20 focus:outline-none focus:ring-2 focus:ring-[#ffd700]/50 transition duration-300">

                <textarea name="comment" placeholder="Залишити коментар" maxlength="300" rows="4"
                          class="w-full px-4 py-3 rounded-md bg-black/40 text-white placeholder-white border border-[#ffd700]/20 focus:outline-none focus:ring-2 focus:ring-[#ffd700]/50 transition duration-300 resize-none"></textarea>

                <p x-show="error" x-text="error" x-cloak class="text-sm text-red-300 text-center"></p>

                <button type="submit" :disabled="sending" :class="sending && 'opacity-60 cursor-not-allowed'"
                        class="w-10/12 md:w-1/2 mx-auto uppercase tracking-wider px-8 py-4 rounded-full font-bold text-lg
                               text-white bg-linear-to-r from-[#7a1103] via-[#d82412] to-[#ffd700]
                               shadow-[0_0_25px_#ffd70066] ring-2 ring-[#ffd700]/30 transition-all duration-300
                               hover:scale-105 hover:shadow-[0_0_35px_#ffd700aa] flex items-center justify-center gap-2">
                    <x-icons.telegram class="w-5 h-5" />
                    <span x-text="sending ? 'Надсилаємо…' : 'Замовити'">Замовити</span>
                </button>
            </form>
        </div>

        {{-- Модалка-подяка --}}
        <div x-show="sent" x-cloak x-transition.opacity.duration.400ms
             class="fixed inset-0 bg-black/70 flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl p-8 max-w-sm text-center shadow-xl" @click.outside="closeModal">
                <h2 class="text-2xl font-bold mb-4 text-gray-900">Дякуємо!</h2>
                <p class="text-gray-700">Ми з вами зв’яжемося найближчим часом.</p>
                <button @click="closeModal"
                        class="mt-6 px-6 py-2 rounded-full bg-[#ffd700] text-black font-semibold hover:bg-yellow-400 transition">
                    Закрити
                </button>
            </div>
        </div>
    </div>
</section>
