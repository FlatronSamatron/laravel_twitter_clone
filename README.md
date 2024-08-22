## install:
- `composer create-project laravel/laravel:^10.0 twitter-clone`
- `composer require rap2hpoutre/laravel-log-viewer`:
  - added route Rap2hpoutre
  - added config/app Rap2hpoutre
- `composer require barryvdh/laravel-debugbar --dev`

## app map:
- Controllers => `php artisan make:controller`:
  - [CommentController.php](app%2FHttp%2FControllers%2FCommentController.php)
  - [DashboardController.php](app%2FHttp%2FControllers%2FDashboardController.php)
  - [IdeaController.php](app%2FHttp%2FControllers%2FIdeaController.php)
- Models:
  - [Idea.php](app%2FModels%2FIdea.php)
  - [Comment.php](app%2FModels%2FComment.php)
  - [User.php](app%2FModels%2FUser.php)
- Requests:
  - asf
- Views:
  - ideas:
    - [edit.blade.php](resources%2Fviews%2Fideas%2Fedit.blade.php)
    - [show.blade.php](resources%2Fviews%2Fideas%2Fshow.blade.php)
  - shared:
    - [comments-box.blade.php](resources%2Fviews%2Fshared%2Fcomments-box.blade.php)
    - [error-message.blade.php](resources%2Fviews%2Fshared%2Ferror-message.blade.php)
    - [follow-box.blade.php](resources%2Fviews%2Fshared%2Ffollow-box.blade.php)
    - [left-sidebar.blade.php](resources%2Fviews%2Fshared%2Fleft-sidebar.blade.php)
    - [search-bar.blade.php](resources%2Fviews%2Fshared%2Fsearch-bar.blade.php)
    - [idea-card.blade.php](resources%2Fviews%2Fshared%2Fidea-card.blade.php)
    - [search-bar.blade.php](resources%2Fviews%2Fshared%2Fsearch-bar.blade.php)
    - [submit-idea.blade.php](resources%2Fviews%2Fshared%2Fsubmit-idea.blade.php)
    - [success-message.blade.php](resources%2Fviews%2Fshared%2Fsuccess-message.blade.php)
  - layouts:
    - [layout.blade.php](resources%2Fviews%2Flayouts%2Flayout.blade.php)
    - [nav.blade.php](resources%2Fviews%2Flayouts%2Fnav.blade.php)
  - [dashboard.blade.php](resources%2Fviews%2Fdashboard.blade.php)
  - [profile.blade.php](resources%2Fviews%2Fprofile.blade.php)

## migrations:
- [2024_08_22_085116_create_ideas_table.php](database%2Fmigrations%2F2024_08_22_085116_create_ideas_table.php)
- [2024_08_22_165533_create_comments_table.php](database%2Fmigrations%2F2024_08_22_165533_create_comments_table.php)

## tables:
- ideas:
  - content (string)
  - likes (unsignedInteger)
- comments:
  - idea_id
  - content

## features:
- [AppServiceProvider.php](app%2FProviders%2FAppServiceProvider.php):
  - Paginator::useBootstrapFive() => use bootstrap-5 for links()