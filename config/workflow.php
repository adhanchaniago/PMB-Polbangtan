<?php

return [
    'straight'   => [
        'type'          => 'state_machine',
        'marking_store' => [
            'type' => 'single_state',
            'arguments' => ['state'],
        ],
        'supports'      => [App\Pendaftaran::class],
        'places'        => ['start', 'pemilihan_jurusan', 'verifikasi_dokumen',
        					'tes_tulis', 'tes_wawancara', 'tes_kesehatan', 'verifikasi_akhir',
        					'selesai', 'gugur_dokumen', 'gugur_tulis', 'gugur_wawancara',
        					'gugur_kesehatan', 'gugur_akhir', 'cancel'],
        'transitions'   => [
            'menyelesaikan_pemberkasan' => [
                'from' => 'start',
                'to'   => 'pemilihan_jurusan',
            ],
            'menyelesaikan_pendaftaran' => [
                'from' => 'pemilihan_jurusan',
                'to'   => 'verifikasi_dokumen',
            ],
            'menolak_dokumen' => [
                'from' => 'verifikasi_dokumen',
                'to'   => 'gugur_dokumen',
            ],
            'memverifikasi_dokumen' => [
                'from' => 'verifikasi_dokumen',
                'to'   => 'tes_tulis',
            ],
            'mengugurkan_ujian' => [
                'from' => 'tes_tulis',
                'to'   => 'gugur_tulis',
            ],
            'memverifikasi_ujian' => [
                'from' => 'tes_tulis',
                'to'   => 'tes_wawancara',
            ],
            'mengugurkan_wawancara' => [
                'from' => 'tes_wawancara',
                'to'   => 'gugur_wawancara',
            ],
            'memverifikasi_wawancara' => [
                'from' => 'tes_wawancara',
                'to'   => 'tes_kesehatan',
            ],
            'mengugurkan_kesehatan' => [
                'from' => 'tes_kesehatan',
                'to'   => 'gugur_kesehatan',
            ],
            'memverifikasi_kesehatan' => [
                'from' => 'tes_kesehatan',
                'to'   => 'verifikasi_akhir',
            ],
            'mengugurkan_pendaftaran' => [
                'from' => 'verifikasi_akhir',
                'to'   => 'gugur_akhir',
            ],
            'menerima_pendaftaran' => [
                'from' => 'verifikasi_akhir',
                'to'   => 'selesai',
            ]
        ],
    ]
];
