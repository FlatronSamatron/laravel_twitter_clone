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
  - IdeaController.php
- Models:
  - Idea
- Requests:
  - asf
- Views:
  - shared:
    - error-message.blade.php
    - idea-card.blade.php
    - submit-idea.blade.php
    - success-message.blade.php
  - layouts:
    - layout.blade.php
    - nav.blade.php
  - dashboard.blade.php
  - profile.blade.php

## migrations:
- `php artisan make:migration create_ideas_table`

## tables:
- ideas:
  - content (string)
  - likes (unsignedInteger)

## features:
- AppServiceProvider:
  - Paginator::useBootstrapFive() => use bootstrap-5 for links()