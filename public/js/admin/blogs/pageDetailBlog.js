function addEventUploadFile() {
    const fileBtn = document.getElementById("upload-image-blog-js");
    fileBtn.addEventListener("change", uploadImage);
}

window.onload = async function () {
    await getInfoUserLoginAdmin();
    await getBlog();
    addEventUploadFile();
};
