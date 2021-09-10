<?php

namespace App\Models\Role;

class Role
{
    public const ROLE_USER = 'user';
    public const ROLE_MODERATOR = 'moderator';
    public const ROLE_ADMIN = 'admin';

    public static function getRoles(): array
    {
        return [
            Role::ROLE_USER,
            Role::ROLE_MODERATOR,
            Role::ROLE_ADMIN,
        ];
    }
}
