function addEventUploadFile() {
    const fileBtn = document.getElementById("upload-avatar-user-js");
    fileBtn.addEventListener("change", uploadAvatar);
}
function resetPasswordNotice() {
    swal({
        title: "Are you sure reset password ?",
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
