## install:
- `composer create-project laravel/laravel:^10.0 twitter-clone`
- `composer require rap2hpoutre/laravel-log-viewer`:
  - added route Rap2hpoutre
  - added config/app Rap2hpoutre
- `composer require barryvdh/laravel-debugbar --dev`

## app map:
- Controllers => `php artisan make:controller`:
  - Admin:
    - [AdminDashboardController.php](app%2FHttp%2FControllers%2FAdmin%2FAdminDashboardController.php)
  - [CommentController.php](app%2FHttp%2FControllers%2FCommentController.php)
  - [DashboardController.php](app%2FHttp%2FControllers%2FDashboardController.php)
  - [IdeaController.php](app%2FHttp%2FControllers%2FIdeaController.php)
  - [AuthController.php](app%2FHttp%2FControllers%2FAuthController.php)
  - [UserController.php](app%2FHttp%2FControllers%2FUserController.php)
  - [UserController.php](app%2FHttp%2FControllers%2FUserController.php)
  - [FeedController.php](app%2FHttp%2FControllers%2FFeedController.php)
- Models:
  - [Idea.php](app%2FModels%2FIdea.php)
  - [Comment.php](app%2FModels%2FComment.php)
  - [User.php](app%2FModels%2FUser.php)
- Mail => `php artisan make:mail WelcomeEmail`:
  - [WelcomeEmail.php](app%2FMail%2FWelcomeEmail.php)

  

- Views:
  - components:
    - [input.blade.php](resources%2Fviews%2Fcomponents%2Finput.blade.php)
  - auth:
    - [login.blade.php](resources%2Fviews%2Fauth%2Flogin.blade.php)
    - [register.blade.php](resources%2Fviews%2Fauth%2Fregister.blade.php)
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
    - [user-edit-card.blade.php](resources%2Fviews%2Fshared%2Fuser-edit-card.blade.php)
    - [user-card.blade.php](resources%2Fviews%2Fshared%2Fuser-card.blade.php)
  - layouts:
    - [layout.blade.php](resources%2Fviews%2Flayouts%2Flayout.blade.php)
    - [nav.blade.php](resources%2Fviews%2Flayouts%2Fnav.blade.php)
  - users:
    - [show.blade.php](resources%2Fviews%2Fusers%2Fshow.blade.php)
    - [edit.blade.php](resources%2Fviews%2Fusers%2Fedit.blade.php)
  - emails:
    - [welcome-email.blade.php](resources%2Fviews%2Femails%2Fwelcome-email.blade.php)
  - [dashboard.blade.php](resources%2Fviews%2Fdashboard.blade.php)
  - [profile.blade.php](resources%2Fviews%2Fprofile.blade.php)

## migrations:
- [2024_08_22_085116_create_ideas_table.php](database%2Fmigrations%2F2024_08_22_085116_create_ideas_table.php)
- [2024_08_22_165533_create_comments_table.php](database%2Fmigrations%2F2024_08_22_165533_create_comments_table.php)
- [2024_08_24_123619_add_bio_and_image_to_users.php](database%2Fmigrations%2F2024_08_24_123619_add_bio_and_image_to_users.php)
- [2024_08_24_162657_create_follower_user_table.php](database%2Fmigrations%2F2024_08_24_162657_create_follower_user_table.php)
- [2024_08_24_162657_create_follower_user_table.php](database%2Fmigrations%2F2024_08_24_162657_create_follower_user_table.php)
- [2024_08_26_084529_remove_likes_from_ideas_table.php](database%2Fmigrations%2F2024_08_26_084529_remove_likes_from_ideas_table.php)
- [2024_08_28_082018_add_is_admin_to_users_table.php](database%2Fmigrations%2F2024_08_28_082018_add_is_admin_to_users_table.php)

## tables:
- ideas:
  - content (string)
  - likes (unsignedInteger) -> deleted
  - user_id
- comments:
  - idea_id
  - user_id
  - content
- follower_user:
  - user_id
  - follower_id -> user_id
- idea_like:
  - idea_id
  - user_id

## features:
- [AppServiceProvider.php](app%2FProviders%2FAppServiceProvider.php):
  - Paginator::useBootstrapFive() => use bootstrap-5 for links()
- Added new route file [auth.php](routes%2Fauth.php) and updated [RouteServiceProvider.php](app%2FProviders%2FRouteServiceProvider.php) => group(base_path('routes/auth.php'));
- mailtrap used for mail send(env setting) => Mail::to($user->email)->send(new WelcomeEmail($user))
- `php artisan tinker`:
  - $u = User::where('name', 'Admin')->first()  
  - $u->is_admin = 1
  - $u->save()

## Permissions:
- Gate:
  - [AuthServiceProvider.php](app%2FProviders%2FAuthServiceProvider.php) => boot:
    - controller => $this->authorize('admin')
    - route => middleware('can:admin')
    - blade => @can('admin')

- middleware:
  - `php artisan make:middleware EnsureUserIsAdmin` => [EnsureUserIsAdmin.php](app%2FHttp%2FMiddleware%2FEnsureUserIsAdmin.php)
  - [Kernel.php](app%2FHttp%2FKernel.php) => `'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class`
  - 
- Policies => php artisan make:policy IdeaPolicy --model=idea:
  - [IdeaPolicy.php](app%2FPolicies%2FIdeaPolicy.php)