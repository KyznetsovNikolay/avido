<?php

namespace App\Models\User;

use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string status
 * @property string role
 * @property string $verify_token
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verify_token',
        'status',
        'email_verified_at',
        'role',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return static
     */
    public static function register(string $name, string $email, string $password): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => Role::ROLE_USER,
            'verify_token' => Str::random(),
            'status' => self::STATUS_WAIT
        ]);
    }

    /**
     * @param $name
     * @param $email
     * @return static
     */
    public static function newStore($name, $email): self
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make(Str::random()),
            'role' => Role::ROLE_USER,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function getRoleLabels(): array
    {
        return [
            Role::ROLE_USER => 'User',
            Role::ROLE_MODERATOR => 'Moderator',
            Role::ROLE_ADMIN => 'Admin',
        ];
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public static function getStatuses(): array
    {
        return [
            self::STATUS_WAIT => 'Waiting',
            self::STATUS_ACTIVE => 'Active'
        ];
    }

    public function verify(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException('User is already verified.');
        }

        $this->update([
            'status' => self::STATUS_ACTIVE,
            'email_verified_at' => now(),
            'verify_token' => null,
        ]);
    }

    public function changeRole(string $role): void
    {
        if (!in_array($role, Role::getRoles())) {
            throw new \InvalidArgumentException('Undefined role "' . $role . '"');
        }
        if ($this->role === $role) {
            throw new \DomainException('Role is already assigned.');
        }
        $this->update(['role' => $role]);
    }

    public function isModerator(): bool
    {
        return $this->role === Role::ROLE_MODERATOR;
    }

    public function isAdmin(): bool
    {
        return $this->role === Role::ROLE_ADMIN;
    }
}
