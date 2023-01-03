<?php

return [
    'auth' => [
        'login-user' => 'Credentials do not match !!!',
        'login-failed' => 'Login failed !!!',
        'register-failed' => 'Register failed !!!',
    ],
    'blog' => [
        'blog-not-found' => 'Blog not found !!!',
        'get-list' => 'Get list blog failed !!!',
        'get' => 'Get blog failed !!!',
        'create' => 'Create blog failed !!!',
        'update' => 'Update blog failed !!!',
        'upload' => 'Upload image failed !!!',
        'delete' => 'Delete blog failed !!!'
    ],
    'file' => [
        'select-file' => 'Please select file !!!',
        'format-file' => 'File is not correct format !!!',
        'file-size' => 'File size is larger than the allowed size !!!',
        'file-not-exists ' => 'File is not exists !!!',
        'can-not-delete-file' => 'Can not delete this file !!!'
    ],
    'mail' => [
        'mail-base' => 'Send mail failed !!!',
    ],
    'permission' => [
        'create-permission' => 'Invalid information to create new permission !!!',
        'update-permission' => 'Invalid information to update permission !!!',
        'give-permission-exists' => 'This user already has this permission !!!',
        'revoke-permission-not-exists' => 'This user does not have this permission yet !!!'
    ],
    'role' => [
        'create-role' => 'Invalid information to create new role !!!',
        'update-role' => 'Invalid information to update role !!!',
        'assign-role-exists' => 'This user already has this role !!!',
        'remove-role-exists' => 'This user does not have this role yet !!!',
        'can-not-delete-role' => 'Can not delete this role !!!',
    ],
    'user' => [
        'user-not-found' => 'User not found !!!',
        'user-id-not-found' => 'User id not found !!!',
        'old-password-not-correct' => 'Old password is not correct !!!',
        'email-not-found' => 'Email not found !!!'
    ],
    'validate' => [
        'invalid-information' => 'Invalid information !!!'
    ],
    'otp' => [
        'user-not-send-otp-mail' => 'You have not requested to send OTP mail !!!',
        'otp-expired-time' => 'Your OTP expired !!!',
        'otp-do-not-match' => 'Your OTP do not match !!!',
    ],
    'comment' => [
        'do-not-have-permission-to-delete' => "You don't have permission to delete this comment !!!",
        'comment-not-found' => 'Comment is not found !!!',
        'comment-id-not-found' => 'Comment ID is not found !!!'
    ],
    'report' => [
        'report-not-found' => 'Report is not found !!!',
        'report-id-not-found' => 'Report ID is not found !!!'
    ],
    'comment-report' => [
        'comment-report-not-found' => 'Comment report is not found !!!',
        'comment-report-id-not-found' => 'Comment report ID is not found !!!',
    ]
];
