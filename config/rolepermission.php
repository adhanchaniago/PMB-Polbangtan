<?php

return [
    'permissions' => [
        'administrator' => [
            'name' => 'administrator',
            'label' => 'Administrator',
        ],
        'user_read' => [
            'name' => 'user_read',
            'label' => 'User Read',
        ],
        'siswa_read' => [
            'name' => 'siswa_read',
            'label' => 'Siswa Read',
        ],
        'siswa_delete' => [
            'name' => 'siswa_delete',
            'label' => 'Siswa Delete',
        ],
        'jadwal_read' => [
            'name' => 'jadwal_read',
            'label' => 'Jadwal Read',
        ],
        'jadwal_create' => [
            'name' => 'jadwal_create',
            'label' => 'Jadwal Create',
        ],
        'jadwal_update' => [
            'name' => 'jadwal_update',
            'label' => 'Jadwal Update',
        ],
        'jadwal_delete' => [
            'name' => 'jadwal_delete',
            'label' => 'Jadwal Delete',
        ],
        'informasi_siswa' => [
            'name' => 'informasi_siswa',
            'label' => 'Informasi Siswa',
        ],
        'daftar_pmb' => [
            'name' => 'daftar_pmb',
            'label' => 'Daftar PMB',
        ],
        'verifikasi_dokumen' => [
            'name' => 'verifikasi_dokumen',
            'label' => 'Verifikasi Dokumen',
        ],
        'tes_tulis' => [
            'name' => 'tes_tulis',
            'label' => 'Tes Tulis',
        ],
        'tes_wawancara' => [
            'name' => 'tes_wawancara',
            'label' => 'Tes Wawancara',
        ],
        'tes_kesehatan' => [
            'name' => 'tes_kesehatan',
            'label' => 'Tes Kesehatan',
        ],
        'verifikasi_akhir' => [
            'name' => 'verifikasi_akhir',
            'label' => 'Verifikasi Akhir',
        ],
        'cms' => [
            'name' => 'cms',
            'label' => 'CMS',
        ],
    ],

    'roles' => [
        'administrator' => [
            'name' => 'administrator',
            'label' => 'Administrator',
            'permissions' => [
                'administrator'
            ],
        ],
        'appadmin' => [
            'name' => 'appadmin',
            'label' => 'Admin Aplikasi',
            'permissions'=> [
                'user_read'
            ],
        ],
        'admin_pusat' => [
            'name' => 'admin_pusat',
            'label' => 'Admin Pusat',
            'permissions'=> [
                'user_read',
                'siswa_read',
                'siswa_delete',
                'jadwal_read',
                'jadwal_create',
                'jadwal_update',
                'jadwal_delete',
                'verifikasi_dokumen',
                'tes_wawancara',
                'tes_kesehatan',
                'verifikasi_akhir',
                'cms'
            ],
        ],
        'operator' => [
            'name' => 'operator',
            'label' => 'Pperator',
            'permissions'=> [
                'siswa_read',
                'jadwal_read',
                'tes_tulis'
            ],
        ],
        'siswa' => [
            'name' => 'siswa',
            'label' => 'Siswa',
            'permissions' => [
            	'informasi_siswa',
            	'daftar_pmb'
            ],
        ]
    ],
];
