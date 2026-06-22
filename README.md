# ЗМОВА — лендинг книги (Laravel)

Промо-сайт роману **«ЗМОВА — День, коли зло переможе...»** Манани Магомедової та
Петра Крижанівського. Повна переробка статичного сайту [zmova.com.ua](https://www.zmova.com.ua/)
на Laravel — той самий дизайн, але з повноцінним бекендом, адмінкою та збіркою фронту.

## Стек

- **Laravel 13** (PHP 8.3)
- **Tailwind CSS v4** через Vite (білд, без CDN) + **Alpine.js**
- **Filament v5** — адмін-панель для заявок
- **SQLite** (за замовчуванням; легко переключити на MySQL)
- Self-hosted шрифти (дзеркало Bunny Fonts, з кирилицею)

## Що зроблено «по-богу» порівняно з оригіналом

| Було (статика) | Стало (Laravel) |
| --- | --- |
| Tailwind через CDN | Зібраний Tailwind v4 (Vite), без зовнішнього JIT |
| Токен Telegram **захардкоджений** у `send.php` | Креди в `.env` → `config/services.php` |
| `send.php` без валідації | `FormRequest` + правила + **honeypot** + `throttle:6,1` |
| Заявка лише летіла в Telegram | Заявка зберігається в БД, шле в Telegram **і** видима в адмінці |
| Падіння Telegram = втрата заявки | Замовлення зберігається завжди; доставка — окрема джоба з ретраями |
| Font Awesome з CDN | Inline-SVG іконки-компоненти |
| Один великий `index.html` | Blade-layout + компоненти секцій |
| `scroll`-слухач для анімацій | `IntersectionObserver` (+ повага до `prefers-reduced-motion`) |

## Запуск

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate --seed   # створює таблиці + адміна

npm run build                # або: npm run dev (під час розробки)
php artisan serve
```

Сайт: <http://127.0.0.1:8000> · Адмінка: <http://127.0.0.1:8000/admin>

## Telegram

У `.env` заповни:

```dotenv
TELEGRAM_BOT_TOKEN=<токен від @BotFather>
TELEGRAM_CHAT_ID=<id групи/каналу>
```

Заявки шлються синхронно (`QUEUE_CONNECTION=sync`) — працює на будь-якому хостингу.
Для масштабу: `QUEUE_CONNECTION=database` + `php artisan queue:work`.

## Адмін Filament

Логін створюється сидером із `.env` (`ADMIN_EMAIL` / `ADMIN_PASSWORD`).
За замовчуванням: `admin@zmova.com.ua` / `zmova-admin-2026` — **зміни пароль перед продакшеном.**

У панелі «Заявки»: список зі статусами, фільтр, бейдж нових заявок, позначка доставки в Telegram.

---

Розробник: **Валерій Комар** · [t.me/realvaleriykomar](https://t.me/realvaleriykomar)
