<?php

define('VALIDATE_ID_MYSQL_BASE', 'required|integer|min:1');

define('VALIDATE_PASSWORD_BASE', 'required|string|min:5|' . 'regex:/[a-z]/|' . 'regex:/[0-9]/');

define('VALIDATE_STR_BASE', 'required|string|min:5');

define('VALIDATE_EMAIL_BASE', 'required|email|min:5');


define('VALIDATE_ID_MYSQL', ['id' => VALIDATE_ID_MYSQL_BASE]);

define('VALIDATE_USER_ID_MYSQL', ['user_id' => VALIDATE_ID_MYSQL_BASE]);

define('VALIDATE_USERNAME', ['username' => VALIDATE_STR_BASE]);

define('VALIDATE_FULLNAME', ['fullname' => VALIDATE_STR_BASE]);

define('VALIDATE_EMAIL', ['email' => VALIDATE_EMAIL_BASE]);

define('VALIDATE_PASSWORD', ['password' => VALIDATE_PASSWORD_BASE]);

define('VALIDATE_NAME', ['name' => VALIDATE_STR_BASE]);

define('VALIDATE_TITLE', ['title' => VALIDATE_STR_BASE]);

define('VALIDATE_SUB_TITLE', ['sub_title' => VALIDATE_STR_BASE]);

define('VALIDATE_CONTENT', ['content' => VALIDATE_STR_BASE]);

define('VALIDATE_OLD_PASSWORD', ['old_password' => VALIDATE_PASSWORD_BASE]);

define('VALIDATE_NEW_PASSWORD', ['new_password' => VALIDATE_PASSWORD_BASE]);

define('VALIDATE_ROLE_ID_MYSQL', ['role_id' => VALIDATE_ID_MYSQL_BASE]);

define('VALIDATE_PERMISSION_ID_MYSQL', ['permission_id' => VALIDATE_ID_MYSQL_BASE]);
