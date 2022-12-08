const successNotiConst = {
    getList: {
        vie: "Lấy danh sách thành công !!!",
        en: "Get list success !!!",
    },
    get: {
        vie: "Lấy thông tin thành công !!!",
        en: "Get info success !!!",
    },
    create: {
        vie: "Tạo mới thành công",
        en: "Create success !!!",
    },
    update: {
        vie: "Cập nhật thành công !!!",
        en: "Update success !!!",
    },
    delete: {
        vie: "Xóa thành công !!!",
        en: "Delete success !!!",
    },
    upload: {
        vie: "Tải file thành công !!!",
        en: "Upload success !!!",
    },
    default: {
        vie: "Thành công !!!",
        en: "Success !!!",
    },
};

const failedNotiConst = {
    getList: {
        vie: "Lấy danh sách thất bại !!!",
        en: "Get list failed !!!",
    },
    get: {
        vie: "Lấy thông tin thất bại !!!",
        en: "Get info failed !!!",
    },
    create: {
        vie: "Tạo mới thất bại !!!",
        en: "Create failed !!!",
    },
    update: {
        vie: "Cập nhật thất bại !!!",
        en: "Update failed !!!",
    },
    delete: {
        vie: "Xóa thất bại !!!",
        en: "Delete failed !!!",
    },
    upload: {
        vie: "Tải file thành công !!!",
        en: "Upload failed !!!",
    },
    default: {
        vie: "Có lỗi xảy ra !!!",
        en: "Some thing went wrong !!!",
    },
};

async function successNoti(type) {
    const cookie = getCookie("X-localization");
    await swal(
        type == "" || type == null || !type
            ? successNotiConst.default[cookie]
            : successNotiConst[type][cookie],
        "",
        "success"
    );
}

async function errorNoti(type) {
    const cookie = getCookie("X-localization");
    await swal({
        title:
            type == "" || type == null || !type
                ? failedNotiConst.default[cookie]
                : failedNotiConst[type][cookie],
        icon: "error",
        button: "OK",
    });
}
