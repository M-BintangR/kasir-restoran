<?php

namespace App\Helpers;

/**
 *  ********************
 *  Ryoogen Const Helpers
 *  ********************
 *
 *  helpers class for our permission constants
 *
 * by Ryoogen Media
 * https://github.com/ryoogenmedia
 */


class AppConst
{
    public const ROLES = [
        'user',
        'admin',
        'superadmin',
    ];

    public const PERMISSIONS = [
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
