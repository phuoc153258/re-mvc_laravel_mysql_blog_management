function addEventUploadFile() {
    const fileBtn = document.getElementById("upload-avatar-user-js");
    fileBtn.addEventListener("change", uploadAvatar);
}

window.onload = function () {
    getInfoUserLogin();
    getUser();
};
