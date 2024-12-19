<?php

return [
    'navigation' => [
        'Pengaturan',
    ],

    'users' => [
        'resource' => [
            'label' => 'Pengguna',
            'labels' => 'Data Pengguna',
            'title' => 'Pengguna',
            'slug' => 'pengaturan/pengguna',
            'icon' => 'heroicon-o-user',
            'nav' => [
                'group' => 'Pengaturan',
                'label' => 'Pengguna',
            ]
        ],
        'field' => [
            'name' => 'Nama',
            'email' => 'Surel',
            'password' => 'Kata Sandi',
            'confirm-password' => 'Konfirmasi Kata Sandi',
            'roles' => 'Peran',
            'created-at' => 'Dibuat',
            'updated-at' => 'Disunting',
        ],
        'button' => [],
        'notification' => [
            'password-helper' => 'kosongkan jika tidak ingin mengubah.'
        ],
    ],
];
