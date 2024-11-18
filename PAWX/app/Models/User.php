<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\Web\AdminController;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function getClientId(): ?int
    {
        return $this->client ? $this->client->id : null;
    }

    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->getRole(), $roles);
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
}
