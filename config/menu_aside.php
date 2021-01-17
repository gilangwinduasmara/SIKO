<?php
// Aside menu

return [

        'konselor' => [
            [
                'title' => 'Dashboard',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/dashboard',
                'new-tab' => false,
            ],
            [
                'title' => 'Daftar Konseli',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/daftarkonseli',
                'new-tab' => false,
            ],
            [
                'title' => 'Case Conference',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/caseconference',
                'new-tab' => false,
            ],
            [
                'title' => 'Arsip',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/arsip',
                'new-tab' => false,
            ]
            ],
            'konseli' => [
                [
                    'title' => 'Dashboard',
                    'root' => true,
                    'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                    'page' => '/dashboard',
                    'new-tab' => false,
                ]
            ]

    ];

if($u->role == 'konselor'){
    return [

        'items' => [
            // Dashboard
            [
                'title' => 'Dashboard',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/dashboard',
                'new-tab' => false,
            ],
            [
                'title' => 'Daftar Konseli',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/daftarkonseli',
                'new-tab' => false,
            ],
            [
                'title' => 'Case Conference',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/caseconference',
                'new-tab' => false,
            ],
            [
                'title' => 'Arsip',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/arsip',
                'new-tab' => false,
            ]
        ]

    ];
}else if($u->role == 'konseli'){

    return [

        'items' => [
            // Dashboard
            [
                'title' => 'Dashboard',
                'root' => true,
                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                'page' => '/dashboard',
                'new-tab' => false,
            ]
        ]
    ];

}
