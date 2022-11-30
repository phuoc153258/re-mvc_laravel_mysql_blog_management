async function uploadAvatar(event) {
    try {
        const selectedFile = event.target.files[0];
        let id = document.getElementById("id-user-update-js").value;
        let formData = new FormData();
        formData.append("file", selectedFile);
        let response = await axios.post(URLUser + `/${id}/avatar`, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
                Authorization: getCookie("access_token"),
            },
        });
        document.getElementById("show-avatar-user-js").src =
            "/" + response.data.data.avatar;
        swal("Upload image success !!!", "", "success");
    } catch (error) {
        swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}
