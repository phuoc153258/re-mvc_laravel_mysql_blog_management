async function uploadImage(event) {
    try {
        const selectedFile = event.target.files[0];

        let formData = new FormData();
        let id = document.getElementById("id-blog-js").value;
        formData.append("file", selectedFile);
        let response = await axios.post(URLBlog + `/${id}/image`, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
                Authorization: getCookie("access_token"),
            },
        });
        document.getElementById("show-image-blog-js").src =
            "/" + response.data.data.image;
        emptyDataDetailsBlog();
        renderDataDetailsBlog(response.data.data);
        await successNoti();
        getList();
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

function addEventUploadFile() {
    const fileBtn = document.getElementById("upload-image-blog-js");
    fileBtn.addEventListener("change", uploadImage);
}
