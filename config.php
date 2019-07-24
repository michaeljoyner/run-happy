<?php

return [
    'production' => false,
    'baseUrl' => 'https://lowlyj.com',
    'collections' => [
        'posts' => [
            'author' => 'Lowly',
            'extends' => '_layouts.posts.page',
            'sort' => ['-date'],
            'path' => '{slug}'
        ],
        'galleries' => [
            'extends' => '_layouts.galleries.page',
            'sort' => ['-date'],
            'path' => '/galleries/{slug}'
        ]
    ],
    
    
];
