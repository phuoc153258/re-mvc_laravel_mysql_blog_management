async function uploadImage(event, id) {
    const selectedFile = event.target.files[0];
    let formData = new FormData();
    formData.append("file", selectedFile);
    let response = await axios.post(URLBlog + `/${id}/image`, formData, {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
    document.getElementById("show-image-blog-js").src =
        "/" + response.data.data.image;
}
