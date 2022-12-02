function addEventUploadFile() {
    const fileBtn = document.getElementById("upload-avatar-user-js");
    fileBtn.addEventListener("change", uploadAvatar);
}

function addHrefChangePassword(id) {
    document.getElementById(
        "change-password-user-js"
    ).href = `/users/${id}/password`;
}

window.onload = async function () {
    await getUser();
    await getInfoUserLogin();
    await getListRole();
};
