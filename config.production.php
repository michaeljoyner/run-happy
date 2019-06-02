<?php

return [
    'production' => true,
    'baseUrl' => 'https://lowlyj.com',
    'collections' => [
        'posts' => [
            'author' => 'Lowly',
            'extends' => '_layouts.posts.page',
            'sort' => ['-date'],
            'path' => '{slug}'
        ],
    ],
];
