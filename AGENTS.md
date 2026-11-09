# AGENTS.md

## Project
- Laravel 10 app on PHP 8.1; MySQL database `db_info` at `127.0.0.1:3306` (user `root`, empty password).
- `README.md` is inaccurate (describes a Node stack); trust `composer.json`, `artisan`, and `routes/`.
- Frontend uses Vite 5 + axios; styling is custom CSS in `resources/css/app.css` (no Tailwind).

## Entry points
- `routes/web.php`: `/` renders `resources/views/home.blade.php` (route name `home`); guest login routes (`/login` GET/POST); auth logout route (`/logout` POST); auth-protected `/dashboard` route (route name `dashboard`, `Admin\DashboardController`).
- Auth: `app/Http/Controllers/Auth/LoginController.php`; login view `resources/views/auth/login.blade.php` (layout `layouts.auth`); home uses `layouts.app`.
- Login validates `email` + `password` only and redirects to `route('dashboard')`; logout redirects to `home`.
- No registration or password-reset routes.

## Commands
- Install: `composer install` then `npm install`
- Env: `.env` exists and is gitignored. MySQL database `db_info` must exist before migrating.
- Run app: `php artisan serve` (or Laragon vhost). Frontend dev: `npm run dev`; production assets: `npm run build`.
- DB: `php artisan migrate` / `php artisan migrate:fresh --seed`. `DatabaseSeeder` is empty, so create a test user via tinker for login.
- Tests: `php artisan test` or `vendor/bin/phpunit`. Single: `php artisan test --filter=Name` or `vendor/bin/phpunit tests/Feature/File.php`.
- Format PHP: `vendor/bin/pint` (defaults; no `pint.json`). No JS lint/typecheck.

## Testing quirks
- `phpunit.xml` keeps the SQLite `DB_CONNECTION`/`DB_DATABASE` lines commented, so tests run against real MySQL `db_info`. Uncomment/set them to `sqlite`/`:memory:` before DB-backed tests.
- `tests/Feature/ExampleTest.php` asserts `/` returns 200.

## Gotchas
- `.editorconfig`: UTF-8, LF, 4-space indent, final newline (trim trailing whitespace off for `.md`).
- Standard Laravel conventions; no comments unless asked.
- Commit messages use Conventional Commits (`feat: ...`).
- Rebuild assets after editing `resources/css` or `resources/js` (`npm run build` or `npm run dev`).
