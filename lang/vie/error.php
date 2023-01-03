<?php

return [
    'auth' => [
        'login-user' => 'Thông tin xác thực không trùng khớp !!!',
        'login-failed' => 'Đăng nhập thất bại !!!',
        'register-failed' => 'Đăng ký thất bại !!!',
    ],
    'blog' => [
        'blog-not-found' => 'Không tìm thấy blog !!!',
        'get-list' => 'Lấy danh sách thông tin blog thất bại !!!',
        'get' => 'Lấy thông tin blog thất bại !!!',
        'create' => 'Tạo mới blog thất bại !!!',
        'update' => 'Cập nhật blog thất bại !!!',
        'upload' => 'Tải ảnh cho blog thất bại !!!',
        'delete' => 'Xóa blog thất bại !!!'
    ],
    'file' => [
        'select-file' => 'Hãy chọn file !!!',
        'format-file' => 'File không đúng định dạng !!!',
        'file-size' => 'Kích thước file là lớn hơn kích thước cho phép !!!',
        'file-not-exists ' => 'File không tồn tại !!!',
        'can-not-delete-file' => 'Không thể xóa file này !!!'
    ],
    'mail' => [
        'mail-base' => 'Gửi mail thất bại !!!',
    ],
    'permission' => [
        'create-permission' => 'Thông tin không hợp lệ để tạo permission !!!',
        'update-permission' => 'Thông tin không hợp lệ để cập nhật permission !!!',
        'give-permission-exists' => 'Người dùng này đã có permission này !!!',
        'revoke-permission-not-exists' => 'Người dùng này không có permission lúc này !!!'
    ],
    'role' => [
        'create-role' => 'Thông tin không hợp lệ để tạo mới role !!!',
        'update-role' => 'Thông tin không hợp lệ để cập nhật role !!!',
        'assign-role-exists' => 'Người dùng này đã có role này !!!',
        'remove-role-exists' => 'Người dùng này chưa có role này !!!',
        'can-not-delete-role' => 'Không thể xóa role này !!!',
    ],
    'user' => [
        'user-not-found' => 'Không tìm thấy người dùng !!!',
        'user-id-not-found' => 'Id của người dùng không tồn tại !!!',
        'old-password-not-correct' => 'Mật khẩu cũ không chính xác !!!',
        'email-not-found' => 'Không tìm thấy địa chỉ email !!!'
    ],
    'validate' => [
        'invalid-information' => 'Thông tin không hợp lệ !!!'
    ],
    'otp' => [
        'user-not-send-otp-mail' => 'Bạn chưa yêu cầu gửi thư OTP !!!',
        'otp-expired-time' => 'OTP của bạn đã hết hạn !!!',
        'otp-do-not-match' => 'OTP của bạn không trùng khớp !!!',
    ],
    'comment' => [
        'do-not-have-permission-to-delete' => "Bạn không có quyền để xóa bình luận này !!!",
        'comment-not-found' => 'Bình luận không tồn tại !!!',
        'comment-id-not-found' => 'Mã bình luận không tồn tại !!!'
    ],
    'report' => [
        'report-not-found' => 'Báo cáo không tồn tại !!!',
        'report-id-not-found' => 'Mã báo cáo không tồn tại !!!'
    ],
    'comment-report' => [
        'comment-report-not-found' => 'Bình luận báo cáo không tồn tại!!!',
        'comment-report-id-not-found' => 'Mã bình luận báo cáo không tồn tại !!!',
    ]
];
