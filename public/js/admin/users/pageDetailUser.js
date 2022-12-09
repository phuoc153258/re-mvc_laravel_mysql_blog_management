function addEventUploadFile() {
    const fileBtn = document.getElementById("upload-avatar-user-js");
    fileBtn.addEventListener("change", uploadAvatar);
}
function resetPasswordNotice() {
    const cookie = getCookie("X-localization");
    swal({
        title:
            cookie == "vie"
                ? "Bạn có muốn khôi phục mật khẩu ?"
                : "Are you sure reset password ?",
        text: "",
        icon: "info",
        buttons: true,
    }).then((willReset) => {
        if (willReset) {
            resetPassword();
        }
    });
}

window.onload = async function () {
    setCookieLanguage();
    await getInfoUserLoginAdmin();
    await getUser();
    await getListRole(false);
    await getListPermission(false);
};
