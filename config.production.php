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
        'galleries' => [
            'extends' => '_layouts.galleries.page',
            'sort' => ['-date'],
            'path' => '/galleries/{section}/{slug}'
        ]
    ],
    'photo_categories' => [
        'travel' => [
            'description' => 'I love to travel. Here, there, everywhere.',
            'cover_image' => 'https://res.cloudinary.com/dy6grlu8z/image/upload/c_scale,w_1211/v1564061182/Jiji/IMG_2958_mu4ek3.jpg'
        ]
    ]
];
