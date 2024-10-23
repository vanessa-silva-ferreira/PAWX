<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

    public function getRole(): string
    {
        if ($this->admin()->exists()) return 'admin';
        if ($this->employee()->exists()) return 'employee';
        if ($this->client()->exists()) return 'client';
        return 'user'; // default role
    }

    public function hasRole(string $role): bool
    {
        return $this->getRole() === $role;
    }

    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->getRole(), $roles);
    }

//    public function getRole(): ?string
//    {
//        if ($this->admin()->exists()) {
//            return 'admin';
//        } elseif ($this->employee()->exists()) {
//            return 'employee';
//        } elseif ($this->client()->exists()) {
//            return 'client';
//        }
//
//        return null;
//    }
//
//    public function hasRole(string $role): bool
//    {
//        return $this->getRole() === $role;
//    }
//
//    public function hasAnyRole(array $roles): bool
//    {
//        return in_array($this->getRole(), $roles);
//    }
}
