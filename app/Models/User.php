<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getAvatar()
    {
        $firstCharacter = $this->email[0];

        if (is_numeric($firstCharacter)) {
            $integerToUse = ord(strtolower($firstCharacter)) - 21;
        } else {
            $integerToUse = ord(strtolower($firstCharacter)) - 96;
        }


        return '//www.gravatar.com/avatar/c314707cc447ff6b2fc4db41410ff349?'
            . md5($this->email)
            . '?s=200'
            . '&d=http://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
            . $integerToUse
            . '.png';
    }

    public function votes()
    {
        return $this->blongsToMany(Idea::class, 'votes');
    }

    public function isAdmin()
    {
        // return in_array( $this->email, [
        //     'admin@admin.com',
        // ]);

        return $this->is_admin;
    }
}