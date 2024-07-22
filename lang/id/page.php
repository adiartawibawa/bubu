<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Pengaturan Umum
    |--------------------------------------------------------------------------
    */
    'general_settings' => [
        'title' => 'Pengaturan Umum',
        'heading' => 'Pengaturan Umum',
        'subheading' => 'Kelola pengaturan situs umum di sini.',
        'navigationLabel' => 'Umum',
        'sections' => [
            "site" => [
                "title" => "Situs",
                "description" => "Kelola pengaturan dasar."
            ],
            "theme" => [
                "title" => "Tema",
                "description" => "Ubah tema default."
            ],
        ],
        "fields" => [
            "brand_name" => "Nama Merek",
            "site_active" => "Status Situs",
            "brand_logoHeight" => "Tinggi Logo Merek",
            "brand_logo" => "Logo Merek",
            "site_favicon" => "Favicon Situs",
            "primary" => "Utama",
            "secondary" => "Sekunder",
            "gray" => "Abu-abu",
            "success" => "Berhasil",
            "danger" => "Bahaya",
            "info" => "Info",
            "warning" => "Peringatan",
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Pengaturan Surat
    |--------------------------------------------------------------------------
    */
    'mail_settings' => [
        'title' => 'Pengaturan Surat',
        'heading' => 'Pengaturan Surat',
        'subheading' => 'Kelola konfigurasi surat.',
        'navigationLabel' => 'Surat',
        'sections' => [
            "config" => [
                "title" => "Konfigurasi",
                "description" => "deskripsi"
            ],
            "sender" => [
                "title" => "Dari (Pengirim)",
                "description" => "deskripsi"
            ],
            "mail_to" => [
                "title" => "Kirim ke",
                "description" => "deskripsi"
            ],
        ],
        "fields" => [
            "placeholder" => [
                "receiver_email" => "Email penerima.."
            ],
            "driver" => "Driver",
            "host" => "Host",
            "port" => "Port",
            "encryption" => "Enkripsi",
            "timeout" => "Waktu Habis",
            "username" => "Nama Pengguna",
            "password" => "Kata Sandi",
            "email" => "Email",
            "name" => "Nama",
            "mail_to" => "Kirim ke",
        ],
        "actions" => [
            "send_test_mail" => "Kirim Surat Uji"
        ]
    ],

];
