## install:
- `composer create-project laravel/laravel:^10.0 twitter-clone`
- `composer require rap2hpoutre/laravel-log-viewer`:
  - added route Rap2hpoutre
  - added config/app Rap2hpoutre
- `composer require barryvdh/laravel-debugbar --dev`

## app map:
- Controllers => `php artisan make:controller`:
  - DashboardController
  - ProfileController
- Views:
  - dashboard.blade.php
  - profile.blade.php