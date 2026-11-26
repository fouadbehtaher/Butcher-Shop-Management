# Butcher-Shop-Management

A work-in-progress butcher shop management project (employees, attendance, inventory, sales, reports). It is mostly scaffolding so far: only the employee module has real code.

## Current status

Only the **employees module** works: list, create, edit, show and soft delete (it sets `status` to `inactive`), with a dashboard page and Arabic RTL views. Attendance, reports, inventory and sales are still empty: their controllers, models, views and migrations have no code, and their routes are not enabled in `routes/web.php`. Nothing was invented for them.

### Run it locally (Laravel 12, PHP 8.2+)

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite   # the default .env.example connection is sqlite; adjust DB_* for MySQL
php artisan migrate --seed       # --seed adds 5 fake demo employees
php artisan serve
php artisan test                 # 5 tests
```

Laravel 12 was chosen because every Laravel 11.x release is currently blocked by Composer's security advisories. The page styles load Bootstrap RTL and Font Awesome from a CDN, so the pages need internet access.

### Security boundary

This is a local prototype. It has **no login, no roles and no authorization**: anyone who can reach the server can read, create, edit and deactivate employee records (names, phone numbers, salaries). Do not deploy it or load real employee data until authentication is added.

### What is not verified

- Tested on sqlite only (not MySQL), and no hosted CI has run.
- The Node workflow in `.github/workflows/node.js.yml` is unchanged and still fails at `npm ci`, because the repo has no Node project at its root.
- `frontend/`, `backend/` and `mobile/` still hold only placeholder files. The docker, nginx and supervisor files are still empty.
- `composer.lock` is committed (application dependency lock). `vendor/` stays ignored. Install with `composer install`.

## Earlier status snapshot (before the bootstrap)

![What exists in the code](docs/images/butcher-implementation-status.png)

The image above shows the state before the bootstrap. It still applies to attendance, reports, inventory and sales.
