function addEventUploadFile() {
    const fileBtn = document.getElementById("upload-avatar-user-js");
    fileBtn.addEventListener("change", uploadAvatar);
}

window.onload = async function () {
    setCookieLanguage();
    await getInfoUserLoginAdmin();
    await getList();
    addEventUploadFile();
};
