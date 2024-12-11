<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;


enum UserType:string {
    case Admin = 'admin';
    case Client = 'client';
    case User = 'user';
    case Employee = 'employee';
}

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;
    use UserUtils;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'nif',
        'username',
        'address'
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

    public function hasRole(string $role): bool
    {
        return $this->getRole() === $role;
    }

    public function getRole(): string
    {
        if ($this->admin()->exists()) return 'admin';
        if ($this->employee()->exists()) return 'employee';
        if ($this->client()->exists()) return 'client';
        return 'user';
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

    public function getClientId()
    {
        return $this->client ? $this->client->id : null;
    }

    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->getRole(), $roles);
    }

    public function isClient(): bool
    {
        return $this instanceof Client;
    }

    public function isAdmin(): bool
    {
        return $this instanceof Admin;
    }

    public function isEmployee(): bool
    {
        return $this instanceof Employee;
    }


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

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            if (!$user->isForceDeleting()) {
                foreach (['client', 'employee'] as $type) {
                    if ($user->$type()->exists()) {
                        $user->$type()->delete();
                    }
                }
            }
        });

        static::restoring(function ($user) {
            foreach (['client', 'employee'] as $type) {
                if ($user->$type()->withTrashed()->exists()) {
                    $user->$type()->restore();
                }
            }
        });
    }
}
