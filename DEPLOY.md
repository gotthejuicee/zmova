# Деплой ЗМОВА

Лендинг на Laravel 13 + Filament. Зібрані ассети (`public/build`) закомічені в репозиторій,
тож **npm на хостингу не потрібен**.

## Що вже готове для продакшену
- `public/build` комітиться (не потрібен `npm run build` на сервері).
- `User` реалізує `FilamentUser::canAccessPanel()` — інакше Filament віддає 403 у non-local.
- Адмін створюється сидером з `ADMIN_EMAIL` / `ADMIN_PASSWORD` (секрети не в репозиторії).
- `.env` у `.gitignore` — реальні токени НЕ потрапляють у git.

## Деплой через Git (напр. Хостинг Україна, SSH)

```bash
# 1. Клон у каталог сайту (корінь сайту має вказувати на public/)
cd ~/your-domain.tld/www
git clone <REMOTE_URL> .

# 2. Залежності PHP (без dev)
COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader

# 3. .env
cp .env.production.example .env
nano .env                      # заповни APP_URL, Telegram, ADMIN_*, БД
php artisan key:generate

# 4. База
touch database/database.sqlite # якщо DB_CONNECTION=sqlite
php artisan migrate --force
php artisan db:seed --force     # створює адміна (ПЕРЕД optimize, поки env() ще читається)

# 5. Сховище та ассети Filament
php artisan storage:link
php artisan filament:assets

# 6. Кеш продакшену
php artisan optimize

# 7. Корінь сайту → public/, увімкни SSL, постав APP_DEBUG=false
```

## Оновлення (після нових комітів)

```bash
git pull
php artisan migrate --force        # якщо додались міграції
php artisan optimize:clear && php artisan optimize
```

> На Хостинг Україна git-пароль = Personal Access Token (GitHub прибрав паролі):
> `git config --global credential.helper store`, логін — твій нік, пароль — PAT.

## Адмінка
`https://your-domain.tld/admin` — логін з `ADMIN_EMAIL` / `ADMIN_PASSWORD`.
**Зміни пароль одразу після першого входу.**
