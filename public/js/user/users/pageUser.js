function addEventUploadFile() {
    const fileBtn = document.getElementById("upload-avatar-user-js");
    fileBtn.addEventListener("change", uploadAvatar);
}

window.onload = async function () {
    await getInfoUserLogin();
    await getUser();
};
