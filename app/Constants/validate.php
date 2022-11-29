<?php

define('VALIDATE_ID_MYSQL', 'required|integer|min:1');

define('VALIDATE_FULLNAME', 'required|string|min:5');

define('VALIDATE_STR', 'required|string|min:1');

define('VALIDATE_EMAIL', 'required|email|min:5');

define('VALIDATE_PASSWORD', 'required|string|min:5|' . 'regex:/[a-z]/|' . "regex:/[0-9]/");
