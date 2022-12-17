<?php

define('PAGINATE', [
    'PAGE' => 1,
    'LIMIT' => 5,
    'SEARCH' => '',
    'SORT' => '',
    'ASC' => 'asc',
    'DESC' => 'desc',
    'IS_PAGINATE' => true
]);

define('USER_PAGINATE_TYPE', [
    'NAME' => 'users',
    'SEARCH_BY' => 'username',
    'SORT_BY' => 'id',
    'SELECT_ITEM' => [
        'users.id',
        'users.username',
        'users.fullname',
        'users.email',
        'users.avatar',
        'users.is_email_verified',
        'users.email_verified_at',
        'users.created_at',
        'users.updated_at'
    ]
]);

define('BLOG_PAGINATE_TYPE', [
    'NAME' => 'blogs',
    'SEARCH_BY' => 'title',
    'SORT_BY' => 'id',
    'SELECT_ITEM' => [
        'blogs.*', 'users.username'
    ],
]);

define('ROLE_PAGINATE_TYPE', [
    'NAME' => 'roles',
    'SEARCH_BY' => 'name',
    'SORT_BY' => 'id',
    'SELECT_ITEM' => ['roles.*']
]);

define('PERMISSION_PAGINATE_TYPE', [
    'NAME' => 'permissions',
    'SEARCH_BY' => 'name',
    'SORT_BY' => 'id',
    'SELECT_ITEM' => ['permissions.*']
]);

define('COMMENT_PAGINATE_TYPE', [
    'NAME' => 'comments',
    'SEARCH_BY' => 'content',
    'SORT_BY' => 'id',
    'SELECT_ITEM' => ['comments.*', 'users.fullname', 'users.avatar']
]);

define('PAGINATE_TYPE', [
    'USER' => USER_PAGINATE_TYPE,
    'BLOG' => BLOG_PAGINATE_TYPE,
    'ROLE' => ROLE_PAGINATE_TYPE,
    'PERMISSION' => PERMISSION_PAGINATE_TYPE,
    'COMMENT' => COMMENT_PAGINATE_TYPE,
]);
