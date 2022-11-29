<?php

define('PAGINATE', [
    'PAGE' => 1,
    'LIMIT' => 5,
    'SEARCH' => '',
    'SORT' => '',
    'ASC' => 'asc',
    'DESC' => 'desc',
]);

define('USER_PAGINATE_TYPE', [
    'NAME' => 'users',
    'SEARCH_BY' => 'username',
    'SORT_BY' => 'id',
    'SELECT_ITEM' => []
]);

define('BLOG_PAGINATE_TYPE', [
    'NAME' => 'blogs',
    'SEARCH_BY' => 'title',
    'SORT_BY' => 'title',
    'SELECT_ITEM' => [
        'blogs.*', 'users.username'
    ]
]);

define('PAGINATE_TYPE', ['USER' => USER_PAGINATE_TYPE, 'BLOG' => BLOG_PAGINATE_TYPE]);
