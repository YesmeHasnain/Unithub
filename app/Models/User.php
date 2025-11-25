<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
// Agar email verification chahiye to upar wali line ko aise kar do:
// class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        // Extra profile fields
        'first_name',
        'last_name',
        'location',
        'bio',
        'website',
        'phone',
        'phone_private',
        'profile_photo_path',
    ];

    /**
     * Hidden attributes (JSON waghera me nahi jayenge).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casts.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_private'     => 'boolean',
        'password'          => 'hashed',
    ];

    /**
     * Full name accessor: $user->full_name
     */
    public function getFullNameAttribute(): string
    {
        if ($this->first_name || $this->last_name) {
            return trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? ''));
        }

        return $this->name ?? $this->email;
    }

    /**
     * Profile photo URL accessor: $user->profile_photo_url
     */
    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo_path) {
            // /storage/profile-photos/xyz.jpg
            return asset('storage/' . $this->profile_photo_path);
        }

        // Default avatar
        return asset('dist/img/avatar12.jpg');
    }
}
