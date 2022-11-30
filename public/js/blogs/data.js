const URLBlog = `/api/blogs`;

async function getList() {
    try {
        let sortItem = document.getElementById("sort-js").value;
        let entriesItem = document.getElementById("entries-js").textContent;
        let searchItem = document.getElementById("input-search-user-js").value;
        let pageItem = document.getElementById("page-input-js").value;
        emptyTable();
        const response = await axios({
            method: "get",
            url:
                URLBlog +
                `?search=${searchItem}&sort=${sortItem}&limit=${entriesItem}&page=${pageItem}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderDataToTable(response.data.data);
        renderDataToListPage(response.data.data);
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function getBlog() {
    try {
        const response = await axios({
            method: "get",
            url: URLBlog + "/" + window.location.pathname.split("/")[2],
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            renderDataDetailsBlog(response.data.data);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function deleteBlog(id) {
    try {
        const response = await axios({
            method: "delete",
            url: URLBlog + `/${id}`,
        });
        if (response.data.status) {
            swal("Delete blog success !!!", "", "success");
            renderDataToTable(response.data.data);
            renderDataToListPage(response.data.data);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function createBlog() {
    try {
        const title = document.getElementById("title-create-js").value;
        const sub_title = document.getElementById("sub_title-create-js").value;
        const content = document.getElementById("content-create-js").value;
        const image = document.getElementById("image-blog-create-js").files[0];
        const user_id = document.getElementById("user_id-create-js").value;
        let formData = new FormData();
        formData.append("title", title);
        formData.append("file", image);
        formData.append("sub_title", sub_title);
        formData.append("content", content);
        formData.append("user_id", user_id);
        let response = await axios.post(URLBlog, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });
        if (response.data.status) {
            await swal("Create blog success !!!", "", "success");
            location.replace(`/blogs/${response.data.data.user_id}`);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        console.log(error);
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function updateBlog() {
    try {
        const id = document.getElementById("id-blog-js").value;
        const title = document.getElementById("title-blog-js").value;
        const sub_title = document.getElementById("sub_title-blog-js").value;
        const content = document.getElementById("content-blog-js").value;
        const response = await axios({
            method: "put",
            url: URLBlog + `/${id}`,
            data: { title, sub_title, content },
        });
        if (response.data.status) {
            await swal("Delete blog success !!!", "", "success");
            renderDataDetailsBlog(response.data.data);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}
