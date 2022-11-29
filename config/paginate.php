<?php
return [
    'PAGINATE' => [
        'PAGE' => 1,
        'LIMIT' => 5,
        'SEARCH' => '',
        'SORT' => '',
        'ASC' => 'asc',
        'DESC' => 'desc',
    ],
    'TYPE' => [
        'USER' => [
            'NAME' => 'users',
            'SEARCH_BY' => 'username',
            'SORT_BY' => 'id',
            'SELECT_ITEM' => []
        ],
        'BLOG' => [
            'NAME' => 'blogs',
            'SEARCH_BY' => 'title',
            'SORT_BY' => 'title',
            'SELECT_ITEM' => [
                'blogs.*', 'users.username'
            ]
        ]
    ]
];
