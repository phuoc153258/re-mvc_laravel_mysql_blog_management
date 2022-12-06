<?php
define('PERMISSION_GET_ME', 'user-get-me');

define('PERMISSION_UPDATE_MY_PROFILE', 'user-update-profile');

define('PERMISSION_CHANGE_MY_PASSWORD', 'user-change-password');

define('PERMISSION_GET_MY_BLOG_LIST', 'user-get-my-blog-list');

define('PERMISSION_GET_MY_BLOG', 'user-get-my-blog');

define('PERMISSION_CREATE_MY_BLOG', 'user-create-my-blog');

define('PERMISSION_UPDATE_MY_BLOG', 'user-update-my-blog');

define('PERMISSION_DELETE_MY_BLOG', 'user-delete-my-blog');

define('PERMISSION_REGISTER_USER_DEFAULT', [
    PERMISSION_GET_ME,
    PERMISSION_UPDATE_MY_PROFILE,
    PERMISSION_CHANGE_MY_PASSWORD,
    PERMISSION_GET_MY_BLOG_LIST,
    PERMISSION_GET_MY_BLOG,
    PERMISSION_CREATE_MY_BLOG,
    PERMISSION_UPDATE_MY_BLOG,
    PERMISSION_DELETE_MY_BLOG,
]);
