async function uploadAvatar(event, id) {
    const selectedFile = event.target.files[0];
    let formData = new FormData();
    formData.append("file", selectedFile);
    let response = await axios.post(URLUser + `/${id}/avatar`, formData, {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
    document.getElementById("show-avatar-user-js").src =
        "/" + response.data.data.avatar;
}
