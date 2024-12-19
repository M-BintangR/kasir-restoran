<?php

namespace App\Helpers;

class PermissionForRole
{
    public const ADMIN = [
        /**
         *  USER MODEL
         */
        'user-view',
        'user-create',
        'user-update',
        'user-delete',
        'user-restore',
        'user-force-delete',
    ];

    public const SUPERADMIN = [
        /**
         *  PERMISSION MODEL
         */
        'permission-view',
        'permission-create',
        'permission-update',
        'permission-delete',
        'permission-restore',
        'permission-force-delete',

        /**
         *  ROLE MODEL
         */
        'role-view',
        'role-create',
        'role-update',
        'role-delete',
        'role-restore',
        'role-force-delete',

        /**
         *  USER MODEL
         */
        'user-view',
        'user-create',
        'user-update',
        'user-delete',
        'user-restore',
        'user-force-delete',
    ];
}
