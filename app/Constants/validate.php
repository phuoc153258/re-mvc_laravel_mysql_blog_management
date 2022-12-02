<?php

define('VALIDATE_ID_MYSQL', ['id' => 'required|integer|min:1']);

define('VALIDATE_USER_ID_MYSQL', ['user_id' => 'required|integer|min:1']);

define('VALIDATE_USERNAME', ['username' => 'required|string|min:5']);

define('VALIDATE_FULLNAME', ['fullname' => 'required|string|min:5']);

define('VALIDATE_EMAIL', ['email' => 'required|email|min:5']);

define('VALIDATE_PASSWORD', ['password' => 'required|string|min:5|' . 'regex:/[a-z]/|' . 'regex:/[0-9]/']);

define('VALIDATE_NAME', ['name' => 'required|string|min:5']);

define('VALIDATE_TITLE', ['title' => 'required|string|min:5']);

define('VALIDATE_SUB_TITLE', ['sub_title' => 'required|string|min:5']);

define('VALIDATE_CONTENT', ['content' => 'required|string|min:5']);

define('VALIDATE_OLD_PASSWORD', ['old_password' => 'required|string|min:5|' . 'regex:/[a-z]/|' . 'regex:/[0-9]/']);

define('VALIDATE_NEW_PASSWORD', ['new_password' => 'required|string|min:5|' . 'regex:/[a-z]/|' . 'regex:/[0-9]/']);



define('VALIDATE_ROLE_NAME', ['name' => 'required|string|min:1']);

define('VALIDATE_STR', 'required|string|min:1');
