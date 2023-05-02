<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'avatar',
        'email_verified_at',
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
//-----------------------------Before deployment !!----------------------------------//
    // public function canAccessFilament(): bool
    // {
    //     return $this->hasRole(['Admin', 'Recruiter','Moderator']);
    // }

    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function bdmpost()
    {
        return $this->hasMany(Bdmpost::class);
    }
    public function submission()
    {
        return $this->hasMany(Submission::class);
    }
    public function referral()
    {
        return $this->hasMany(Referral::class);
    }
    public function uploadownprofille()
    {
        return $this->hasMany(Uploadownprofile::class);
    }
    public function interview()
    {
        return $this->hasMany(Interview::class);
    }
}
