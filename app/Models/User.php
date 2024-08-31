<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class)->latest();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }



    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Idea::class, 'idea_like')->withTimestamps();
    }

    public function followers(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'follower_user', 'user_id', 'follower_id');
    }

    public function followings(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
    }

    public function getImageUrl()
    {
        return $this->image ? url("storage/$this->image") : 'https://api.dicebear.com/6.x/fun-emoji/svg';
    }

    public function isFollow($user)
    {
        return $user->followers->pluck('id')->contains(auth()->id());
    }

    public function isLiked(Idea $idea)
    {
        return $this->likes()->where('idea_id', $idea->id)->exists();
    }



}
