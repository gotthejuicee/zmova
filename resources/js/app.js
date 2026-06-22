import Alpine from 'alpinejs';

/* ------------------------------------------------------------------ *
 *  Анімації при скролі.
 *  Замість слухача 'scroll' (як у старому main.js) — IntersectionObserver:
 *  він не смикає головний потік на кожен піксель прокрутки.
 * ------------------------------------------------------------------ */
function initScrollAnimations() {
    const targets = document.querySelectorAll(
        '.animate-on-scroll, .animate-fade-in, .animate-zoom-in'
    );

    // Якщо користувач просить менше анімацій — показуємо все одразу.
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduceMotion || !('IntersectionObserver' in window)) {
        targets.forEach((el) => el.classList.add('animated'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    obs.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -10% 0px' }
    );

    targets.forEach((el) => observer.observe(el));
}

/* ------------------------------------------------------------------ *
 *  Закриття мобільного меню (pure-CSS чекбокс) після кліку по лінку.
 * ------------------------------------------------------------------ */
function initMobileMenu() {
    const toggle = document.getElementById('menu-toggle');
    if (!toggle) return;

    document.querySelectorAll('#nav-links a').forEach((link) => {
        link.addEventListener('click', () => {
            toggle.checked = false;
        });
    });
}

/* ------------------------------------------------------------------ *
 *  Alpine-компонент форми замовлення: фільтр телефону, AJAX,
 *  стани відправки та модалка-подяка.
 * ------------------------------------------------------------------ */
function orderForm() {
    return {
        sending: false,
        sent: false,
        error: '',

        // Лишаємо в телефоні лише цифри, пробіли та + - ( )
        filterPhone(event) {
            event.target.value = event.target.value.replace(/[^\d\s()+-]/g, '');
        },

        async submit(event) {
            if (this.sending) return;

            this.sending = true;
            this.error = '';

            const form = event.target;
            const url = form.getAttribute('action');

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'),
                    },
                    body: new FormData(form),
                });

                if (!response.ok) {
                    const data = await response.json().catch(() => ({}));
                    this.error =
                        data.message ||
                        (data.errors ? Object.values(data.errors)[0][0] : '') ||
                        'Помилка при надсиланні. Спробуйте ще раз.';
                    return;
                }

                form.reset();
                this.openModal();
            } catch (e) {
                this.error = 'Помилка мережі. Спробуйте ще раз.';
                console.error(e);
            } finally {
                this.sending = false;
            }
        },

        openModal() {
            this.sent = true;
            setTimeout(() => (this.sent = false), 4000);
        },

        closeModal() {
            this.sent = false;
        },
    };
}

window.Alpine = Alpine;
Alpine.data('orderForm', orderForm);
Alpine.start();

initScrollAnimations();
initMobileMenu();
